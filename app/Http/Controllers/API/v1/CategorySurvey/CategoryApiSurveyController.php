<?php

namespace App\Http\Controllers\API\v1\CategorySurvey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryApiSurveyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $category = \App\Models\CategorySurvey::get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data kategori survey berhasil diambil',
            'data' => $category
        ], 200);
    }
}
