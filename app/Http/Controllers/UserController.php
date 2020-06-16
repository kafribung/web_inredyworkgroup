<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Import User Request
use App\Http\Requests\UserRequest;

// Import Class Hash
use Illuminate\Support\Facades\Hash;

// Import DB User
use App\Models\User;


class UserController extends Controller
{
    //READ
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 0)->get();
        return view('dashboard.user', compact('users'));
    }

    //URL CREATE
    public function create()
    {
        return view('dashboard_create.user_create');
    }

    //CREATE
    public function store(UserRequest $request)
    {
        return abort('404'); 
    }

    // SHOW
    public function show($id)
    {
        return abort('404'); 
    }

    // EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard_edit.user_edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);

        $data['password'] = Hash::make($request->password);

        User::findOrFail($id)->update($data);

        return redirect('/user')->with('msg', 'Data User Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/user')->with('msg', 'Data User Berhasil di Hapus');
    }
}
