<?php

namespace App\Http\Controllers\Web\CategorySurvey;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CategorySurvey;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CategorySurveyController extends Controller
{

    public function index(): View
    {
        if (Gate::denies('category-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        $data = [
            'Categori' => \App\Models\CategorySurvey::get(),
            'active' => 'category'
        ];

        return view(
            'pages.admin.category_survey.index',
            $data
        );
    }

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        // abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('category-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        try {
            $validatedData = $request->except('_token');
            CategorySurvey::create($validatedData);
            return redirect()->back()->with('success', 'Data kategori ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kategori ditambah.');
        }
        return redirect()->back()->with('success', 'Data kategori ditambah.');
    }

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
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('category-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        try {
            $category = CategorySurvey::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Data Kategori berhasil diperbaharui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Kategori gagal diperbaharui');
        }
    }


    /**
     * Remove the resource from storage.
     */
    public function destroy($id)
    {
        if (Gate::denies('category-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }
        // dd("oke");
        try {
            $asset = CategorySurvey::findOrFail($id);
            $asset->delete();
            return redirect()->back()->with('success', 'Data Kategori berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Kategori gagal dihapus');
        }
    }
}
