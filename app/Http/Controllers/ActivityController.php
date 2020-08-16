<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;

class ActivityController extends Controller
{
    // READ
    public function index()
    {
        $activities = Activity::with('user')->latest()->paginate(20);
        return view('dashboard.activitiy', compact('activities'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.activity_create');
    }

    // STORE 
    public function store(ActivityRequest $request)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        if (Activity::where('slug', $data['slug'])->first() != null) {
            $data['slug'] .= time();
        }
        $request->user()->activities()->create($data);
        return redirect('/activity')->with('msg', 'Data Kegiatan Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $activity = Activity::where('slug', $slug)->first();
        return view('dashboard_edit.activity_edit', compact('activity'));
    }

    // UPDATE
    public function update(ActivityRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($request->title);
        if (Activity::where('slug', $data['slug'])->first() != null) {
            $data['slug'] .= time();
        }
        Activity::findOrFail($id)->update($data);
        return redirect('/activity')->with('msg', 'Data Kegiatan Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        Activity::destroy($id);
        return redirect()->back()->with('msg', 'Data Kegiatan Berhasil di Hapus');
    }
}
