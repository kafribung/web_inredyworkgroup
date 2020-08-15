<?php

namespace App\Http\Controllers;

// Impoer Class CreationRequest
use Illuminate\Support\Str;
// Import DB Cration Concentration
use Illuminate\Http\Request;
// Import Class Str
use App\Http\Requests\CreationRequest;
use App\Models\{Creation, Concentration};


class CreationController extends Controller
{
    // READ
    public function index()
    {
        $search = urldecode(request('search'));
        if ($search)
            $creations = Creation::with('user', 'concentration')->latest()->where('title', 'like', '%' . $search . '%')->paginate(6);
        else
            $creations = Creation::with('user', 'concentration')->latest()->paginate(6);
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
        $data['status'] = 1;
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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'video' => ['required', 'active_url'],
            'team'  => ['required', 'string', 'min:3', 'max:200'],
            'concentration_id' => ['required', 'integer'],
            'description'      => ['required', 'min:5'],
        ]);
        $creation =  Creation::findOrFail($id);
        if ($creation->title != null) {
            $data['title'] = $request->title . '-' . time();
        }
        $data['slug'] = Str::slug($request->title);
        $creation->update($data);
        return redirect('/creation')->with('msg', 'Data Karya Berhasil di Perbaruhi');
    }

    // DESTROY
    public function destroy($id)
    {
        Creation::destroy($id);
        return redirect('/creation')->with('msg', 'Data Karya Berhasil di Hapus');
    }

    // Active
    public function active(Creation $creation)
    {
        Creation::findOrFail($creation->id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('msg', 'Data Karya Berhasil diapprove');
    }

    // Panding
    public function panding(Creation $creation)
    {
        $creation  = Creation::findOrFail($creation->id);
        $creation->status = 0;
        $creation->save();
        return redirect()->back()->with('msg', 'Data Karya Berhasil diunapprove');
    }
}
