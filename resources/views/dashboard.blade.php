@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Dashboard Sensor</h1>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Cahaya</th>
                <th class="p-2">Status</th>
                <th class="p-2">Kelembaban</th>
                <th class="p-2">Status</th>
                <th class="p-2">pH</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="text-center border-t">
                <td class="p-2">{{ $item->cahaya }}</td>
                <td class="p-2">
                    <span class="
                        {{ $item->status_cahaya == 'terang' ? 'text-yellow-500' : '' }}
                        {{ $item->status_cahaya == 'normal' ? 'text-green-500' : '' }}
                        {{ $item->status_cahaya == 'gelap' ? 'text-gray-500' : '' }}
                    ">
                        {{ $item->status_cahaya }}
                    </span>
                </td>

                <td class="p-2">{{ $item->kelembaban_tanah }}</td>
                <td class="p-2">
                    <span class="
                        {{ $item->status_kelembaban == 'kering' ? 'text-red-500' : '' }}
                        {{ $item->status_kelembaban == 'normal' ? 'text-green-500' : '' }}
                        {{ $item->status_kelembaban == 'basah' ? 'text-blue-500' : '' }}
                    ">
                        {{ $item->status_kelembaban }}
                    </span>
                </td>

                <td class="p-2">{{ $item->ph_air }}</td>
                <td class="p-2">
                    <span class="
                        {{ $item->status_ph == 'asam' ? 'text-red-500' : '' }}
                        {{ $item->status_ph == 'normal' ? 'text-green-500' : '' }}
                        {{ $item->status_ph == 'basa' ? 'text-blue-500' : '' }}
                    ">
                        {{ $item->status_ph }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection