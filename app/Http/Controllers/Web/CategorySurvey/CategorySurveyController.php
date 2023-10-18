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
        // dd("oke");
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // dd($request);

        try {
            $validatedData = $request->except('_token');

            // Menyimpan gambar (icon)
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/icons'), $iconName); // Simpan gambar ke direktori tertentu
                $validatedData['icon'] = 'uploads/icons/' . $iconName; // Simpan path gambar ke dalam kolom 'icon'
            }

            CategorySurvey::create($validatedData);
            return redirect()->back()->with('success', 'Data kategori ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kategori gagal ditambah.');
        }
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
        $category = CategorySurvey::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        try {
            $validatedData = $request->except('_token');

            // Mengupdate gambar (icon) jika ada perubahan
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/icons'), $iconName); // Simpan gambar ke direktori tertentu
                $validatedData['icon'] = 'uploads/icons/' . $iconName; // Simpan path gambar ke dalam kolom 'icon'
            }

            $category->update($validatedData);
            return redirect()->back()->with('success', 'Data kategori diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data kategori gagal diperbarui.');
        }
    }

    // public function update(Request $request, $id)
    // {
    //     if (Gate::denies('category-list')) {
    //         abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
    //     }
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //     ]);

    //     try {
    //         $category = CategorySurvey::findOrFail($id);
    //         $category->update([
    //             'name' => $request->name,
    //             'description' => $request->description,
    //         ]);

    //         return redirect()->back()->with('success', 'Data Kategori berhasil diperbaharui');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Data Kategori gagal diperbaharui');
    //     }
    // }


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
