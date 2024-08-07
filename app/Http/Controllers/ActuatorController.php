<?php
namespace App\Http\Controllers;

use App\Models\ActuatorData;

class ActuatorController extends Controller
{
    public function index()
    {
        $actuators = ActuatorData::all();
        return view('actuators', compact('actuators'));
    }
}
