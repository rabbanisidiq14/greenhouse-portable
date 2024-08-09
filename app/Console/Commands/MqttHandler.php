<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SensorData;
use App\Models\ActuatorData;
use App\Models\MqttTopic;
use App\Models\ControlParameter;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MqttHandler extends Command
{
    protected $signature = 'mqtt:handle';
    protected $description = 'Handle MQTT communication for sensor data and actuators';

    private $mqtt;

    public function __construct()
    {
        parent::__construct();

        // Initialize MQTT client
        $server = '10.200.16.59'; // replace with your MQTT server
        $port = 1883;
        // $clientId = 'laravel_mqtt_client';

        $connectionSettings = (new ConnectionSettings)
            ->setUsername('username') // replace with your MQTT username
            ->setPassword('password') // replace with your MQTT password
            ->setUseTls(false);

        $this->mqtt = new MqttClient($server, $port);
    }

    public function handle()
    {
        Log::info('Starting MQTT handler.');
        try{
            // Hubungkan ke broker MQTT
            $this->mqtt->connect();
            Log::info('Connected to MQTT broker.');
            // Subscribe to all sensor topics
            $sensorTopics = MqttTopic::where('topic_name', 'like', 'sensor/%')->get();
            foreach ($sensorTopics as $sensorTopic) {
                Log::info('Subscribing to topic: ' . $sensorTopic->topic_name);
                $this->mqtt->subscribe($sensorTopic->topic_name, function ($topic, $message){
                    Log::info('Received message on topic: ' . $topic . ' with message: ' . $message);
                    $this->processSensorData($topic, $message);
                    Log::info('Publishing actuator data.');
                    $this->publishActuatorData();
                }, 0);
            }
            while (true) {
                Log::info('Waiting for messages...');
                $this->mqtt->loop(true);
                sleep(5);
            }
        }catch (\Exception $e) {
            Log::error('Failed to connect or subscribe: ' . $e->getMessage());
        } finally {
            $this->mqtt->disconnect();
            Log::info('Disconnected from MQTT broker.');
        }
    }

    private function processSensorData($topic, $message)
    {
        $timestamp = Carbon::now();

        $topicRecord = MqttTopic::where('topic_name', $topic)->first();
        if (!$topicRecord) {
            Log::error('Topic not found: ' . $topic);
            return;
        }

        $topicId = $topicRecord->id;

        Log::info('Processing sensor data for topic ID: ' . $topicId);
        
        try {
            // Menyimpan data ke database
            SensorData::create([
                'topic_id' => $topicId,
                'sensor_value' => $message,
                'timestamp' => $timestamp,
            ]);
    
            Log::info('Sensor data saved for topic ID: ' . $topicId . ' with value: ' . $message);
        } catch (\Exception $e) {
            // Tangkap dan log error
            Log::error('Failed to save sensor data: ' . $e->getMessage());
        }
    }

    private function publishActuatorData()
    {
        $actuatorTopics = MqttTopic::where('topic_name', 'like', 'aktuator/%')->get();
        Log::info('Getting actuator topics');
        foreach ($actuatorTopics as $actuatorTopic) {
            Log::info('Getting actuator data: ' . $actuatorTopic->topic_name);
            $latestActuatorData = ActuatorData::where('topic_id', $actuatorTopic->id)
                ->orderBy('id', 'desc')
                ->first();
            
            if($latestActuatorData->topic_id == '13'){
                Log::info('Memproses topic id : ' . $latestActuatorData->topic_id);
                $controlParameters = ControlParameter::where('parameter_name', 'kelembapan tanah')->first();
                Log::info('Memproses Control Parameter : kelembapan tanah');
                $sensorValue = SensorData::where('topic_id', 12)->orderBy('id', 'desc')->first();
                Log::info('Memproses Sensor pada topic : ' . $sensorValue->topic_id);
                if($sensorValue->sensor_value < $controlParameters->target_value) {
                    Log::info('Kelembapan '.$sensorValue->sensor_value.' < Target '.$controlParameters->target_value);
                    Log::info('Mengubah state pompa jadi on');
                    ActuatorData::create([
                        'topic_id' => $latestActuatorData->topic_id,
                        'actuator_state' => 'on',
                        'timestamp'=> Carbon::now(),
                    ]);
                }else{
                    Log::info('Kelembapan '.$sensorValue->sensor_value.' >= Target '.$controlParameters->target_value);
                    Log::info('Mengubah state pompa jadi off');
                    ActuatorData::create([
                        'topic_id' => $latestActuatorData->topic_id,
                        'actuator_state' => 'off',
                        'timestamp'=> Carbon::now(),
                    ]);
                }
            }
            else if($latestActuatorData->topic_id == '14'){
                Log::info('Memproses topic id : ' . $latestActuatorData->topic_id);
                $controlParameters = ControlParameter::where('parameter_name', 'suhu ruangan')->first();
                Log::info('Memproses Control Parameter : suhu ruangan');
                $sensorValue = SensorData::where('topic_id', 4)->orderBy('id', 'desc')->first();
                Log::info('Memproses Sensor pada topic : ' . $actuatorTopic->topic_name);
                if($sensorValue->sensor_value > $controlParameters->target_value) {
                    Log::info('Suhu '.$sensorValue->sensor_value.'oC > Target '.$controlParameters->target_value.'oC');
                    Log::info('Mengubah state kipas jadi on');
                    ActuatorData::create([
                        'topic_id' => $latestActuatorData->topic_id,
                        'actuator_state' => 'on',
                        'timestamp'=> Carbon::now(),
                    ]);
                }else{
                    Log::info('Suhu '.$sensorValue->sensor_value.'oC <= Target '.$controlParameters->target_value.'oC');
                    Log::info('Mengubah state kipas jadi off');
                    ActuatorData::create([
                        'topic_id' => $latestActuatorData->topic_id,
                        'actuator_state' => 'off',
                        'timestamp'=> Carbon::now(),
                    ]);
                }
            }
            else{
                Log::info('Topic actuator tidak valid');
            }
            Log::info('Mendapatkan nilai Aktuator terbaru');
            $newActuatorData = ActuatorData::where('topic_id', $actuatorTopic->id)
            ->orderBy('id', 'desc')
            ->first();
            Log::info('Publishing data '.$newActuatorData->topic_id.' = '.$newActuatorData->actuator_state);
            if ($newActuatorData) {
                $this->mqtt->publish($actuatorTopic->topic_name, 
                $newActuatorData->actuator_state
                , 0);
                Log::info('Publish data '.$newActuatorData->topic_id.' = '.$newActuatorData->actuator_state.' sukses');
            }
        }

    }
}
