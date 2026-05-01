@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<x-header 
  title="Edit Profile 👤" 
  desc="Kelola informasi akun kamu" 
/>

<div class="bg-white p-6 rounded-xl shadow mt-6 ">

    <form method="POST" action="{{ route('profile.update') }}">
      @csrf

        <div class="mb-4">
            <label class="text-sm text-gray-600">Nama</label>
            <input type="text" 
                   value="{{ auth()->user()->name }}"
                   class="w-full mt-1 px-3 py-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" 
                   value="{{ auth()->user()->email }}"
                   class="w-full mt-1 px-3 py-2 border rounded-lg">
        </div>

        <button class="bg-emerald-500 text-white px-4 py-2 rounded-lg">
            Simpan
        </button>

    </form>

</div>

@endsection