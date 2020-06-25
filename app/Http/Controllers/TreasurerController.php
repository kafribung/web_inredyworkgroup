<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TreasurerRequest;

// Import Class Hash
use Illuminate\Support\Facades\Hash;

// Import Class STR
use Illuminate\Support\Str;

// Import DB User
use App\Models\User;

class TreasurerController extends Controller
{
    // READ
    public function index()
    {
        $treasurers = User::where('role', 2)->latest()->get();

        return view('dashboard.treasurer', compact('treasurers'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.treasurer_create');
    }

    // STORE
    public function store(TreasurerRequest $request)
    {
        if (User::where('role', 2)->count() >= 1) {
            return redirect('/treasurer')->with('msg', 'Data Bendahara Max 1');
        }

        $data = $request->all();

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() .'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_user'), $name);

            $data['img'] = $name;
        }

        $data['password'] = Hash::make($request->password);
        $data['status']   = 2;
        $data['role']     = 2;
        $data['token']    = Str::random(30);

        User::create($data);

        return redirect('/treasurer')->with('msg', 'Data Bendahara Berhasil Di Tambhakan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $treasurer = User::findOrFail($id);

        return view('dashboard_edit.treasurer_edit', compact('treasurer'));
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
            $name= time() .'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_user'), $name);

            $data['img'] = $name;
        }

        $data['password'] = Hash::make($request->password);

        User::findOrFail($id)->update($data);

        return redirect('/treasurer')->with('msg', 'Data Bendahara Berhasil Di Perbaruhi');
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/treasurer')->with('msg', 'Data Bendahara Berhasil Di Hapus');
    }
}
