<?php

namespace App\Http\Controllers\API\v1\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyApiController extends Controller
{
    public function index()
    {
        $survey = \App\Models\Survey::get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data survey',
            'data' => $survey
        ], 200);
    }
}
