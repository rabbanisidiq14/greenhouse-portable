<?php

namespace App\Http\Controllers;

use App\Models\ControlParameter;
use Illuminate\Http\Request;

class ControlParameterController extends Controller
{
    public function index()
    {
        $parameters = ControlParameter::orderBy('id', 'ASC')->get();
        return view('control-parameters.index', compact('parameters'));
    }

    public function create()
    {
        return view('control-parameters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'parameter_name' => 'required|string|max:255',
            'target_value' => 'required|numeric',
        ]);

        ControlParameter::create($request->all());
        return redirect()->route('control-parameters')->with('success', 'Control Parameter created successfully.');
    }

    public function edit(ControlParameter $controlParameter)
    {
        return view('control-parameters.edit', compact('controlParameter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'parameter_name' => 'required|string|max:255',
            'target_value' => 'required|numeric',
        ]);
        $controlParameter = ControlParameter::find($id);
        $controlParameter->parameter_name = $request->input('parameter_name');
        $controlParameter->target_value = $request->input('target_value');
        $controlParameter->save();
        
        return redirect()->route('control-parameters')->with('success', 'Control Parameter updated successfully.');
    }

    public function destroy($id)
    {
        $controlParameter = ControlParameter::find($id);
        $controlParameter->delete();
        return redirect()->route('control-parameters')->with('success', 'Control Parameter deleted successfully.');
    }
}

