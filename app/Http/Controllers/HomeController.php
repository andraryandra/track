<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *n
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $total_user = \App\Models\User::count();
        return view('pages.admin.home_admin', [
            'total_user' => $total_user,
            'active' => 'dashboard'
        ]);
    }
}
