<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningRequest;
use App\Models\Concentration;
use App\Models\{User,  Learning};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LearningController extends Controller
{
    // READ
    public function index()
    {
        $learnings = Learning::with('user')->latest()->get();
        return view('dashboard.learning', compact('learnings'));
    }

    // CREATE
    public function create()
    {
        $users = User::where('role', 0)->where('status', 2)->get();
        $concentrations = Concentration::latest()->get();
        return view('dashboard_create.learning_create', compact('users', 'concentrations'));
    }

    // STORE
    public function store(LearningRequest $request)
    {
        $data = $request->all();
        if ($img = $request->file('img')) {
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_learnings'), $name);
            $data['img'] = $name;
        }
        Learning::create($data);
        return redirect('/learning')->with('msg', 'Data Pembelajaran Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort("404");
    }

    // EDIT
    public function edit(Learning $learning)
    {
        $users = User::where('role', 0)->where('status', 2)->get();
        $concentrations = Concentration::latest()->get();
        return view('dashboard_edit.learning_edit', compact("learning", "users", "concentrations"));
    }

    // EDIT
    public function update(LearningRequest $request,  $id)
    {
        $data = $request->all();
        $learning = Learning::findOrFail($id);
        if ($img = $request->file('img')) {
            $name = time() . '.' . $img->getClientOriginalExtension();
            if ($learning->img != 'default_learning.jpg') {
                File::delete('img_learnings/' . $learning->img);
            }
            $img->move(public_path('img_learnings'), $name);
            $data['img'] = $name;
        }
        $learning->update($data);
        return redirect('learning')->with('msg', 'Data Pembelajaran Berhasil diUpdate');
    }

    // DELETE
    public function destroy($id)
    {
        $learning = Learning::findOrFail($id);
        if ($learning->img != 'default_learning.jpg') {
            File::delete('img_learnings/' . $learning->img);
        }
        $learning->delete();
        return redirect()->back()->with('msg', 'Data Pembelajaran Berhasil diHapus');
    }
}
