<?php

namespace App\Http\Controllers;
// Import User Request
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

// Import Class Hash
use Illuminate\Support\Facades\{Hash, File};

// Import Class STR
use Illuminate\Support\Str;

// Import DB User, Position, Concentration
use App\Models\{User, Position, Concentration};

class UserController extends Controller
{
    //READ
    public function index()
    {
        $seacrh = urldecode(request('search'));
        if ($seacrh) {
            $users = User::orderBy('id', 'DESC')->where([
                ['role', 0],
                ['name', 'like', '%' . $seacrh . '%']
            ])->paginate(20);
        } else  $users = User::orderBy('id', 'DESC')->where('role', 0)->paginate(20);

        return view('dashboard.user', compact('users'));
    }

    //URL CREATE
    public function create()
    {
        $positions      = Position::latest()->get();
        $concentrations = Concentration::latest()->get();
        return view('dashboard_create.user_create', compact('positions', 'concentrations'));
    }

    //CREATE
    public function store(UserRequest $request)
    {
        $data = request()->all();
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_users'), $name);
            $data['img'] = $name;
        }
        $data['password']  = Hash::make($request->password);
        $data['token']     = Str::random(30);
        $data['status']    = 1;

        User::create($data);
        return redirect('/user')->with('msg', 'Data User Berhasil Di Tambhakan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($email)
    {
        $user = User::where('email', $email)->first();
        $positions      = Position::latest()->get();
        $concentrations = Concentration::latest()->get();
        return view('dashboard_edit.user_edit', compact('user', 'positions', 'concentrations'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'img'       => ['required', 'mimes:png,jpg,jpeg'],
            'nir'       => ['required', 'string', 'min:10', 'max:15'],
            'name'      => ['required', 'string', 'min:3', 'max:25'],
            'email'     => ['required', 'email'],
            'date_birth' => ['required', 'date'],
            'address'   => ['required'],
            'hp'        => ['required', 'string'],
            'password'  => ['required', 'string', 'min:6'],
            'job'       => ['required', 'string', 'min:5', 'max:255'],
            'position_id'  => ['required', 'string'],
            'concentration_id' => ['required', 'string']
        ]);
        $user = User::findOrFail($id);
        if ($img = $request->file('img')) {
            $name = time() . '.' . $img->getClientOriginalExtension();
            if ($user->img != 'default_user.png') {
                File::delete('img_users/' . $user->img);
            }
            $img->move(public_path('img_users'), $name);
            $data['img'] = $name;
        }
        $data['password']  = Hash::make($request->password);
        $user->update($data);
        return redirect('/user')->with('msg', 'Data User Berhasil Di Perbaruhi');
    }

    // DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->img != 'default_user.png') {
            File::delete('img_users/' . $user->img);
        }
        User::destroy($id);
        return redirect('/user')->with('msg', 'Data User Berhasil di Hapus');
    }

    // ACTIVE
    public function active($nir)
    {
        $user = User::where('nir', $nir)->first();
        User::where('nir', $nir)->update([
            'status' => 2
        ]);
        return redirect('/user')->with('msg', 'Data ' . $user->nir . ' di Aktifkan');
    }

    // PANDING
    public function panding($nir)
    {
        $user = User::where('nir', $nir)->first();
        User::where('nir', $nir)->update([
            'status' => 1
        ]);
        return redirect('/user')->with('msg', 'Data ' . $user->nir . ' di Panding');
    }
}
