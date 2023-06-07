<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorInfo extends Model
{
    use HasFactory;

    public $table = 'sensor_info';

    protected $fillable = [
        'id_string',
        'raum',
        'beschreibung',
    ];
}
