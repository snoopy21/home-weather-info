<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    public $table = 'sensor_data';
    
    protected $fillable = [
        'id_string',
        'temp',
        'hum',
        'time'
    ];
}
