<?php

namespace App\Http\Controllers;

use App\Models\SensorData;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->formatData(
            SensorData::latest()->take(10)->get()
        );

        return view('dashboard', compact('data'));
    }

    public function apiSensor()
    {
        $data = $this->formatData(
            SensorData::latest()->take(10)->get()
        );

        return response()->json($data);
    }

    private function formatData($items)
    {
        return $items->flatMap(function ($item) {
            return [
                [
                    'sensor' => 'Cahaya',
                    'waktu' => $item->created_at,
                    'nilai' => $item->cahaya,
                    'satuan' => 'lux',
                    'status' => $this->statusCahaya($item->cahaya),
                ],
                [
                    'sensor' => 'Kelembaban Tanah',
                    'waktu' => $item->created_at,
                    'nilai' => $item->kelembaban_tanah,
                    'satuan' => '%',
                    'status' => $this->statusKelembaban($item->kelembaban_tanah),
                ],
                [
                    'sensor' => 'pH Air',
                    'waktu' => $item->created_at,
                    'nilai' => $item->ph_air,
                    'satuan' => '',
                    'status' => $this->statusPh($item->ph_air),
                ]
            ];
        });
    }

    private function statusCahaya($value)
    {
        if ($value < 100) return 'gelap';
        if ($value <= 300) return 'normal';
        return 'terang';
    }

    private function statusKelembaban($value)
    {
        if ($value < 40) return 'kering';
        if ($value <= 70) return 'normal';
        return 'basah';
    }

    private function statusPh($value)
    {
        if ($value < 6) return 'asam';
        if ($value <= 7.5) return 'normal';
        return 'basah';
    }

    // coba coba
    private function getSensorData($field, $callback)
{
    return SensorData::select('id', $field, 'created_at')
        ->latest()
        ->paginate(5)
        ->through(function ($item) use ($field, $callback) {
            $item->status = $this->$callback($item->$field);
            return $item;
        });
}

    public function cahaya()
    {
        $data = $this->getSensorData('cahaya', 'statusCahaya');
        return view('sensor.cahaya', compact('data'));
    }

    public function tanah()
    {
        $data = $this->getSensorData('kelembaban_tanah', 'statusKelembaban');
        return view('sensor.tanah', compact('data'));
    }

    public function air()
    {
        $data = $this->getSensorData('ph_air', 'statusPh');
        return view('sensor.air', compact('data'));
    }
}