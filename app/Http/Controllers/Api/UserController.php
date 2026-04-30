<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "Ambil semua user"
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            "message" => "User berhasil ditambahkan",
            "data" => $request->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            "message" => "Detail user",
            "id" => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        return response()->json([
            "message" => "User berhasil diupdate",
            "id" => $id,
            "data" => $request->all()
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            "message" => "User berhasil dihapus",
            "id" => $id
        ]);
    }
}