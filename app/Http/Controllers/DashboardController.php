<?php

namespace App\Http\Controllers;

use App\Models\SensorData;

class DashboardController extends Controller
{
    public function index()
    {
        $data = SensorData::latest()->get();

        $data->map(function ($item) {
            $item->status_kelembaban = $this->statusKelembaban($item->kelembaban_tanah);
            $item->status_cahaya = $this->statusCahaya($item->cahaya);
            $item->status_ph = $this->statusPh($item->ph_air);
            return $item;
        });

        return view('dashboard', compact('data'));
    }

    private function statusKelembaban($value)
    {
        if ($value < 40) return 'kering';
        if ($value <= 70) return 'normal';
        return 'basah';
    }

    private function statusCahaya($value)
    {
        if ($value < 100) return 'gelap';
        if ($value <= 300) return 'normal';
        return 'terang';
    }

    private function statusPh($value)
    {
        if ($value < 6) return 'asam';
        if ($value <= 7.5) return 'normal';
        return 'basa';
    }
}