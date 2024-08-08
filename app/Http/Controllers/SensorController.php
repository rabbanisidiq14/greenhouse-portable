<?php
namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensorData = SensorData::all();
        return response()->json($sensorData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required|exists:mqtt_topics,id',
            'sensor_value' => 'required|numeric',
            'timestamp' => 'required|date',
        ]);

        $sensorData = SensorData::create($request->all());
        return response()->json($sensorData, 201);
    }

    public function show($id)
    {
        $sensorData = SensorData::findOrFail($id);
        return response()->json($sensorData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topic_id' => 'sometimes|required|exists:mqtt_topics,id',
            'sensor_value' => 'sometimes|required|numeric',
            'timestamp' => 'sometimes|required|date',
        ]);

        $sensorData = SensorData::findOrFail($id);
        $sensorData->update($request->all());
        return response()->json($sensorData);
    }

    public function destroy($id)
    {
        $sensorData = SensorData::findOrFail($id);
        $sensorData->delete();
        return response()->json(null, 204);
    }
}
