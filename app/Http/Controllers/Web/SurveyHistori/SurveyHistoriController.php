<?php

namespace App\Http\Controllers\Web\SurveyHistori;

use App\Models\Survey;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CategorySurvey;
use App\Http\Controllers\Controller;
use App\Models\Survey_Histories;
use Illuminate\Support\Facades\Gate;

class SurveyHistoriController extends Controller
{

    public function index(): View
    {
        // dd("oke");
        $data = [
            'Survey' => Survey::get(),
            'histori' => Survey_Histories::get(),
            'active' => 'history-survey'
        ];
        return view('pages.admin.survey_histori.index', $data);
    }

    /**
     * Show the form for creating the resource.
     */
    // public function create()
    // {
    //     if (Gate::denies('survey-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }

    //     $data = [
    //         'Survey' => Survey::all(),
    //         'categori' => CategorySurvey::all(),
    //         'active' => 'survey'
    //     ];

    //     return view('pages.admin.survey.create', $data);
    // }

    /**
     * Store the newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     if (Gate::denies('survey-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }

    //     $request->validate([
    //         'category_id' => 'required',
    //         'name' => 'required',
    //         'latitude' => '',
    //         'longitude' => '',
    //         'link_survey' => 'required',
    //         'polygon' => '',
    //         'description' => '',
    //         'poin' => 'required',
    //     ]);

    //     try {
    //         Survey::create($request->all());
    //         return redirect()->route('dashboard.survey.index')->with('success', 'Data survey ditambah.');
    //     } catch (\Throwable $th) {
    //         return back()->withErrors(['error' => 'Data survey gagal ditambah.']);
    //     }
    // }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    // public function edit($id)
    // {
    //     if (Gate::denies('survey-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }

    //     $categori = CategorySurvey::all(); // Ambil semua data dari CategorySurvey
    //     $data_survey = Survey::find($id);
    //     return view('pages.admin.survey.edit', [
    //         'categori' => $categori,
    //         'data_survey' => $data_survey,
    //         'active' => 'survey'

    //     ]);
    // }

    /**
     * Update the resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     if (Gate::denies('survey-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }

    //     $request->validate([
    //         'category_id' => 'required',
    //         'name' => 'required',
    //         'link_survey' => 'required',
    //         'polygon' => 'nullable',
    //         'description' => 'nullable',
    //     ]);

    //     try {
    //         $category = Survey::findOrFail($id);
    //         $category->update([
    //             'category_id' => $request->category_id,
    //             'name' => $request->name,
    //             'link_survey' => $request->link_survey,
    //             'polygon' => $request->polygon,
    //             'description' => $request->description,
    //         ]);

    //         return redirect()->route('dashboard.survey.index')->with('success', 'Data survey berhasil diperbaharui.');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Data survey gagal diperbaharui');
    //     }
    // }


    /**
     * Remove the resource from storage.
     */
    // public function destroy($id)
    // {
    //     if (Gate::denies('survey-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }
    //     // dd("oke");
    //     try {
    //         $asset = Survey::findOrFail($id);
    //         $asset->delete();
    //         return redirect()->back()->with('success', 'Data survey berhasil dihapus');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Data survey gagal dihapus');
    //     }
    // }
}
