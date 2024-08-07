<?php
namespace App\Http\Controllers;

use App\Models\MqttTopic;
use App\Models\MqttClient;
use Illuminate\Http\Request;

class MqttTopicController extends Controller
{
    public function index()
    {
        $topics = MqttTopic::with('client')->orderBy('id', 'ASC')->get();
        return view('topics.index', compact('topics'));
    }

    public function edit($id)
    {
        $topics = MqttTopic::find($id);
        $clients = MqttClient::orderBy('id', 'ASC')->get();
        return view('topics.edit', compact('topics', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topic_name' => 'required|string|max:255',
            'client_id' => 'required|string|max:255',
        ]);

        $topic = MqttTopic::find($id);
        $topic->topic_name = $request->input('topic_name');
        $topic->client_id = $request->input('client_id');
        $topic->save();

        return redirect()->route('topics')->with('success', 'Topics updated successfully');
    }


    public function destroy($id)
    {
        $topic = MqttTopic::find($id);
        $topic->delete();
        return redirect()->route('topics')->with('success', 'topic deleted successfully');
    }

    public function create(){
        $clients = MqttClient::orderBy('id', 'ASC')->get();
        return view('topics.create', compact('clients'));
    }
    
    public function store(Request $request){
        $request->validate([
            'topic_name' => 'required|string|max:255',
            'client_id' => 'required|string|max:255',
        ]);

        MqttTopic::create([
            'topic_name' => $request->input('topic_name'),
            'client_id' => $request->input('client_id'),
        ]);
    
        return redirect()->route('topics')->with('success', 'Topics created successfully');
    }
}
