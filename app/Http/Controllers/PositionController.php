<?php

namespace App\Http\Controllers;

// Import Class RequestPosition
use App\Http\Requests\PositionRequest;
// Import Db Position
use App\Models\Position;

class PositionController extends Controller
{
    // READ
    public function index()
    {
        $positions = Position::latest()->get();
        return view('dashboard.position', compact('positions'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.position_create');
    }

    // STORE
    public function store(PositionRequest $request)
    {
        $data = $request->all();

        if (Position::count() >= 4) {
            return redirect('/position')->with('msg', 'Data Jabatan MAX 4');
        }
        Position::create($data);
        return redirect('/position')->with('msg', 'Data Jabatan Berhasil di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('dashboard_edit.position_edit', compact('position'));
    }

    // UPDATE
    public function update(PositionRequest $request, $id)
    {
        $data = $request->all();
        Position::findOrFail($id)->update($data);
        return redirect('/position')->with('msg', 'Data Jabatan Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        Position::destroy($id);
        return redirect('/position')->with('msg', 'Data Jabatan Berhasil di Hapus');
    }
}
