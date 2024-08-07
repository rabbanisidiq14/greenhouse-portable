<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id', 'sensor_value', 'timestamp',
    ];

    public $timestamps = false;

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    public function topic()
    {
        return $this->belongsTo(MqttTopic::class);
    }
}
