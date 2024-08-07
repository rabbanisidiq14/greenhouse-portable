<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActuatorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id', 'actuator_state', 'timestamp',
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
