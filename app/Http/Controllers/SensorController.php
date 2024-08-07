<?php
namespace App\Http\Controllers;

use App\Models\SensorData;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = SensorData::all();
        return view('sensors', compact('sensors'));
    }
}
