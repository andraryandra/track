<?php

namespace App\Http\Controllers\API\v1\CategorySurvey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryApiSurveyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request)
    // {
    //     $category = \App\Models\CategorySurvey::get();
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Data kategori survey berhasil diambil',
    //         'data' => $category
    //     ], 200);
    // }

    public function index()
    {
        $category = \App\Models\CategorySurvey::get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data kategori survey berhasil diambil',
            'data' => $category
        ], 200);
    }

    public function show($id)
    {
        $category = \App\Models\CategorySurvey::find($id);
        if ($category) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data kategori survey berhasil diambil',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kategori survey tidak ditemukan',
                'data' => null
            ], 404);
        }
    }
}
