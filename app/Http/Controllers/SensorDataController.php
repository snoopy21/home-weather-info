<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Models\SensorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // IDs aus Tabelle holen
        $sensors = SensorInfo::all();
        $ids = '';
        foreach ($sensors as $key => $sensor) {
            if ($key === 0) {
                $ids = $sensor->id_string;
            } else {
                $ids = $ids . ',' . $sensor->id_string;
            }
        }
        // Werte prüfen
        $validateData = $request->validate([
            'item' => 'in:'.$ids,
            'temp' => 'required|numeric|min:-40|max:50',
            'humidity' => 'required|integer|min:0|max:100',
            'time' => 'required'
        ]);
        // Werte abspeichern
        try {
            SensorData::insert([
                'id_string' => $request->item,
                'temp' => $request->temp,
                'hum' => $request->humidity,
                'rssi' => $request->rssi,
                'time' => Carbon::createFromTimestamp($request->time)->toDateTimeString(),
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function show(SensorData $sensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorData $sensorData)
    {
        //
    }
}
