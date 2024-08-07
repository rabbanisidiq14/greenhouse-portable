<?php

namespace App\Http\Controllers;

use App\Models\ControlParameter;

class ControlParameterController extends Controller
{
    public function index()
    {
        $parameters = ControlParameter::all();
        return view('control-parameters', compact('parameters'));
    }
}

