<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Class Hash
use Illuminate\Support\Facades\Hash;
// Import DB User
use App\Models\User;

class AdminController extends Controller
{
    // READ
    public function index()
    {
        $admins = User::where('role', 1)->get();

        return view('dashboard.admin', compact('admins'));
    }

    // CREATE
    public function create()
    {
        return abort('404');
    }

    // STORE
    public function store(Request $request)
    {
        return abort('404');
    }

    //
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $admin =  User::findOrFail($id);
        return view('dashboard_edit.admin_edit', compact('admin'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'img'       => ['mimes:png,jpg,jpeg'],
            'name'      => ['required', 'string', 'min:3', 'max:25'],
            'email'     => ['required', 'email'],
            'password'  => ['required', 'string', 'min:6']
        ]);

        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_user'), $name);
            $data['img'] = $name;
        }

        $data['password'] = Hash::make($request->password);
        User::findOrFail($id)->update($data);
        return redirect('/admin')->with('msg', 'Data Admin Berhasil Di Perbaruhi');
    }

    // DELETE
    public function destroy($id)
    {
        if (User::where('role', 1)->count() == 1) {
            return redirect('/admin')->with('msg', 'Data Admin Min 1');
        }
        User::destroy($id);
        return redirect('/admin')->with('msg', 'Data Admin Berhasil Di Hapus');
    }
}
