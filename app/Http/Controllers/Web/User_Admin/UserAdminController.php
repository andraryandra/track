<?php

namespace App\Http\Controllers\Web\User_Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserAdminController extends Controller
{

    public function index(): View
    {
        // dd("oke");
        if (Gate::denies('users-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }
        $data = [
            'active' => 'user_admin',
            'users' => User::get(),
        ];

        return view(
            'pages.admin.menu_user.user_admin.index',
            $data
        );
    }

    // /**
    //  * Display the resource.
    //  */
    public function show($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'active' => 'user_admin'
        ];

        return view(
            'pages.admin.menu_user.user_admin.show',
            $data
        );
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        // dd("oke");
        if (Gate::denies('users-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        $data = [
            'user' => User::findOrFail($id),
            'active' => 'user_location'
        ];

        return view(
            'pages.admin.menu_user.user_admin.edit',
            compact('user', 'roles', 'userRole'),
            $data
        );
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // dd("oke");
        if (Gate::denies('users-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id,

            'roles' => 'required'

        ]);



        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        } else {

            $input = Arr::except($input, array('password'));
        }



        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();



        $user->assignRole($request->input('roles'));



        return redirect()->route('dashboard.userAdmin.index')

            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        dd("oke");
        if (Gate::denies('users-list')) {
            abort(403); // Tampilkan halaman 403 Forbidden jika tidak memiliki izin.
        }

        User::find($id)->delete();

        return redirect()->route('dashboard.userAdmin.index')

            ->with('success', 'User deleted successfully');
    }
}
