<?php

namespace App\Http\Livewire;
use App\Models\SensorData;

use Livewire\Component;

class SensorDataView extends Component
{
    public $sensor_id;

    public function render()
    {
        return view('livewire.sensor-data-view', [
            'sensor_data_point' => SensorData::where('id_string', $this->sensor_id)->orderBy('time', 'desc')->first(),
        ]);
    }
}
