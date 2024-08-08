<?php
// app/Http/Controllers/ActuatorDataController.php

namespace App\Http\Controllers;

use App\Models\ActuatorData;
use Illuminate\Http\Request;

class ActuatorController extends Controller
{
    public function index()
    {
        $actuatorData = ActuatorData::all();
        return response()->json($actuatorData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_id' => 'required|exists:mqtt_topics,id',
            'actuator_state' => 'required|string|max:255',
            'timestamp' => 'required|date',
        ]);

        $actuatorData = ActuatorData::create($request->all());
        return response()->json($actuatorData, 201);
    }

    public function show($id)
    {
        $actuatorData = ActuatorData::findOrFail($id);
        return response()->json($actuatorData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topic_id' => 'sometimes|required|exists:mqtt_topics,id',
            'actuator_state' => 'sometimes|required|string|max:255',
            'timestamp' => 'sometimes|required|date',
        ]);

        $actuatorData = ActuatorData::find($id);
        $actuatorData->topic_id = $request->topic_id;
        $actuatorData->actuator_state = $request->actuator_state;
        $actuatorData->timestamp = $request->timestamp;
        $actuatorData->save();

        return response()->json($actuatorData);
    }

    public function destroy($id)
    {
        $actuatorData = ActuatorData::findOrFail($id);
        $actuatorData->delete();
        return response()->json(null, 204);
    }
}

