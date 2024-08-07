<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqttTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_name', 'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(MqttClient::class);
    }

    public function sensorData()
    {
        return $this->hasMany(SensorData::class);
    }

    public function actuatorData()
    {
        return $this->hasMany(ActuatorData::class);
    }
}
