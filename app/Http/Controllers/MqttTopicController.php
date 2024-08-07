<?php
namespace App\Http\Controllers;

use App\Models\MqttTopic;

class MqttTopicController extends Controller
{
    public function index()
    {
        $topics = MqttTopic::all();
        return view('topics', compact('topics'));
    }
}
