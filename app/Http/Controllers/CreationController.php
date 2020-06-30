<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Impoer Class CreationRequest
use App\Http\Requests\CreationRequest;

// Import DB Cration
use App\Models\Creation;

// Import DB Concentration
use App\Models\Concentration;

// Import Class Str
use Illuminate\Support\Str;


class CreationController extends Controller
{
    // READ
    public function index()
    {
        $creations = Creation::with('user', 'concentration')->latest()->get();

        return view('dashboard.creation', compact('creations'));
    }

    // CREATE
    public function create()
    {
        $concentrations = Concentration::latest()->get();

        return view('dashboard_create.creation_create', compact('concentrations'));
    }

    // STORE
    public function store(CreationRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $request->user()->creations()->create($data);

        return redirect('/creation')->with('msg', 'Data Karya Berhasil di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $creation       = Creation::where('slug', $slug)->first();
        $concentrations = Concentration::latest()->get();

        return view('dashboard_edit.creation_edit', compact('creation', 'concentrations'));
    }

    // UPDATE
    public function update(CreationRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        Creation::findOrFail($id)->update($data);

        return redirect('/creation')->with('msg', 'Data Karya Berhasil di Perbaruhi');
    }

    // DESTROY
    public function destroy($id)
    {
        Creation::destroy($id);

        return redirect('/creation')->with('msg', 'Data Karya Berhasil di Hapus');
    }
}
