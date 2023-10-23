<?php

namespace App\Http\Controllers\Web\User_Location;

use App\Models\User;
use App\Models\Survey;
use Illuminate\View\View;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Models\CategorySurvey;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserLocationController extends Controller
{

    public function index(): View
    {
        if (Gate::denies('survey-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        $lokasi = UserLocation::all();
        $data = [
            'active' => 'user_location'
        ];

        return view(
            'pages.admin.menu_user.user_location.index',
            compact('lokasi'),
            $data
        );
    }

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        // dd("oke");
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("oke");
    }

    /**
     * Display the resource.
     */
    public function show($id)
    {
        // dd("oke");
        $lokasi = UserLocation::findOrFail($id);
        $survey = Survey::all();
        $total_survey = Survey::count();
        $data = [
            'active' => 'user_location'
        ];

        return view(
            'pages.admin.menu_user.user_location.show',
            compact('lokasi', 'survey', 'total_survey'),
            $data
        );
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        // dd("oke");
        if (Gate::denies('survey-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        $users = User::all();
        $lokasi = UserLocation::findOrFail($id);
        $data = [
            'active' => 'user_location'
        ];

        return view(
            'pages.admin.menu_user.user_location.edit',
            compact('lokasi', 'users'),
            $data
        );
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'address' => 'nullable',
        ]);

        try {
            $lokasi = UserLocation::findOrFail($id);
            $lokasi->update([
                'user_id' => $request->user_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'address' => $request->address,
            ]);

            return redirect()->route('dashboard.user_location.index')->with('success', 'Data lokasi berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data lokasi gagal diperbarui');
        }
    }



    /**
     * Remove the resource from storage.
     */
    public function destroy($id)
    {
        // dd("oke");
        if (Gate::denies('survey-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }
        try {
            $lokasi = UserLocation::findOrFail($id);
            $lokasi->delete();
            return redirect()->back()->with('success', 'Data lokasi berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data lokasi gagal dihapus');
        }
    }
}
