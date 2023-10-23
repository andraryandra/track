<?php

namespace App\Http\Controllers\API\v1\UserLocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLocationApiController extends Controller
{
    public function index()
    {
        $userLocation = \App\Models\UserLocation::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'List Semua User Location',
            'data'    => $userLocation
        ], 200);
    }

    public function AuthIndex($id)
    {
        $userLocation = \App\Models\UserLocation::with('user')->where('user_id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'List Semua User Location',
            'data'    => $userLocation
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $userLocation = \App\Models\UserLocation::create([
            'user_id' => $request->user_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        if ($userLocation) {
            return response()->json([
                'success' => true,
                'message' => 'User Location Berhasil Disimpan!',
                'data'    => $userLocation
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Location Gagal Disimpan!',
            ], 400);
        }
    }
}
