<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqttClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'client_name',
    ];

    public function topics()
    {
        return $this->hasMany(MqttTopic::class);
    }
}
