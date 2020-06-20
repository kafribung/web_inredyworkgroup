<?php

namespace App\Http\Controllers;
// Import User Request
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

// Import Class Hash
use Illuminate\Support\Facades\Hash;

// Import Class STR
use Illuminate\Support\Str;

// Import DB User
use App\Models\User;

// Import DB Position
use App\Models\Position;

// Import DB Concentration
use App\Models\Concentration;

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
        $positions      = Position::latest()->get();
        $concentrations = Concentration::latest()->get();

        return view('dashboard_create.user_create', compact('positions', 'concentrations'));
    }

    //CREATE
    public function store(UserRequest $request)
    {
        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_users'), $name);

            $data_img = $name;
        }

        $data_pass  = Hash::make($request->password);
        $data_token = Str::random(30);

        User::create([
            'img'       => $data_img,
            'nir'       => $request->nir,
            'name'      => $request->name,
            'email'     => $request->email,
            'date_birth'=> $request->date_birth,
            'address'   => $request->address,
            'hp'        => $request->hp,
            'password'  => $data_pass,
            'job'       => $request->job,
            'position_id'  => $request->position,
            'concentration_id' =>$request->concentration,
            'status'    => 1,
            'token'     =>  $data_token
        ]);

        return redirect('/user')->with('msg', 'Data User Berhasil Di Tambhakan');
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
        $positions      = Position::latest()->get();
        $concentrations = Concentration::latest()->get();

        return view('dashboard_edit.user_edit', compact('user' ,'positions', 'concentrations'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'img'       => ['required','mimes:png,jpg,jpeg'],
            'nir'       => ['required', 'string', 'min:10', 'max:15'],
            'name'      => ['required', 'string', 'min:3', 'max:25'],
            'email'     => ['required', 'email'],
            'date_birth'=> ['required', 'date'],
            'address'   => ['required'],
            'hp'        => ['required', 'string'],
            'password'  => ['required', 'string', 'min:6'],
            'job'       => ['required', 'string', 'min:5', 'max:255'],
            'position'  => ['required', 'string'],
            'concentration' => ['required', 'string']
        ]);

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_users'), $name);

            $data_img = $name;
        }

        $data_pass  = Hash::make($request->password);
        $data_token = Str::random(30);

        User::findOrFail($id)->update([
            'img'       => $data_img,
            'nir'       => $request->nir,
            'name'      => $request->name,
            'email'     => $request->email,
            'date_birth'=> $request->date_birth,
            'address'   => $request->address,
            'hp'        => $request->hp,
            'password'  => $data_pass,
            'job'       => $request->job,
            'position_id'  => $request->position,
            'concentration_id' =>$request->concentration,
            'token'     =>  $data_token
        ]);

        return redirect('/user')->with('msg', 'Data User Berhasil Di Perbaruhi');
    }

    // DELETE
    public function destroy($id)
    {
        dd('hard');
        User::destroy($id);

        return redirect('/user')->with('msg', 'Data User Berhasil di Hapus');
    }

    // ACTIVE
    public function active($nir) {
        $user = User::where('nir', $nir)->first();
        
        User::where('nir', $nir)->update([
            'status' => 2
        ]);

        return redirect('/user')->with('msg', 'Data ' . $user->nir. ' di Aktifkan');
    }

    // PANDING
    public function panding($nir) {
        $user = User::where('nir', $nir)->first();
        
        User::where('nir', $nir)->update([
            'status' => 1
        ]);

        return redirect('/user')->with('msg', 'Data ' . $user->nir. ' di Panding');
    }

    
}
