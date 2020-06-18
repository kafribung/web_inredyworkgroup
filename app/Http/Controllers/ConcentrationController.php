<?php

namespace App\Http\Controllers;

// Import Class Request Concentration
use App\Http\Requests\ConcentrationsRequest;

// Import DB Concentration
use App\Models\Concentration;

class ConcentrationController extends Controller
{
    // READ
    public function index()
    {
        $concentrations = Concentration::latest()->get();

        return view('dashboard.concentration', compact('concentrations'));
    }

    // CREAT
    public function create()
    {
        return view('dashboard_create.concentration_create');
    }

    // STORE
    public function store(ConcentrationsRequest $request)
    {
        $data = $request->all();

        Concentration::create($data);

        return redirect('/concentration')->with('msg', 'Data Konsentrasi Berhasil Di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $concentration = Concentration::findOrFail($id);

        return view('dashboard_edit.concentration_edit', compact('concentration'));
    }

    // UPDATE
    public function update(ConcentrationsRequest $request, $id)
    {
        $data = $request->all();

        Concentration::findOrFail($id)->update($data);

        return redirect('/concentration')->with('msg', 'Data Konsentrasi Berhasil Di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        Concentration::destroy($id);

        return redirect('/concentration')->with('msg', 'Data Konsentrasi Berhasil Di Hapus');
    }
}
