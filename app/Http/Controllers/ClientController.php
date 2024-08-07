<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MqttClient;

class ClientController extends Controller
{
    public function index(){
        $clients = MqttClient::orderBy('id', 'ASC')->get();
        return view('clients.index', compact('clients'));
    }

    public function edit($id)
    {
        $client = MqttClient::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
        ]);

        $client = MqttClient::find($id);
        $client->client_id = $request->input('client_id');
        $client->client_name = $request->input('client_name');
        $client->save();

        return redirect()->route('clients')->with('success', 'Client updated successfully');
    }


    public function destroy($id)
    {
        $client = MqttClient::find($id);
        $client->delete();
        return redirect()->route('clients')->with('success', 'Client deleted successfully');
    }

    public function create(){
        return view('clients.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'client_id' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
        ]);

        MqttClient::create([
            'client_id' => $request->input('client_id'),
            'client_name' => $request->input('client_name'),
        ]);
    
        return redirect()->route('clients')->with('success', 'Client created successfully');
    }
}
