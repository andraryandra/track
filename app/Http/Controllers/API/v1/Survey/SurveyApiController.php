<?php

namespace App\Http\Controllers\API\v1\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;


class SurveyApiController extends Controller
{

    public function index()
    {
        $survey = \App\Models\Survey::with('categori')->get();

        return ResponseFormatter::success([
            'survey'    => $survey,
        ], 'Authentication successful');
    }
}
