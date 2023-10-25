<?php

namespace App\Http\Controllers\API\v1\CategorySurvey;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategorySurvey;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $description = $request->input('description');
        $icon = $request->input('icon');

        if ($id) {
            $survey = CategorySurvey::with(['survey'])->find($id);

            if ($survey)
                return ResponseFormatter::success(
                    $survey,
                    'Data survey berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data survey tidak ada',
                    404
                );
        }

        $survey = CategorySurvey::with(['survey']);

        if ($name)
            $survey->where('name', 'like', '%' . $name . '%');

        if ($description)
            $survey->where('description', 'like', '%' . $description . '%');

        if ($icon)
            $survey->where('icon', 'like', '%' . $icon . '%');

        return ResponseFormatter::success(
            $survey->paginate($limit),
            'Data list survey berhasil diambil'
        );
    }


    public function index()
    {
        $categories = \App\Models\CategorySurvey::get();

        // Memeriksa dan menyesuaikan URL ikon
        $categories->transform(function ($category) {
            if (!Str::startsWith($category->icon, ['http://', 'https://'])) {
                $category->icon = env('APP_URL') . Storage::url($category->icon);
            }
            return $category;
        });

        return ResponseFormatter::success([
            'success' => true,
            'message' => 'Data kategori survey berhasil diambil',
            'category' => $categories,
        ]);
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
