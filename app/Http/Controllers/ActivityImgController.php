<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityImgController extends Controller
{
    // READ
    public function index(Activity $activity)
    {
        return view('dashboard.activity_img', compact('activity'));
    }

    // CREATE
    public function create(Activity $activity)
    {
        return view('dashboard_create.activity_img_create', compact('activity'));
    }

    // STORE
    public function store(Request $request, Activity $activity)
    {
        if (ActivityImg::where('activity_id', $activity->id)->count() >= 3) {
            return redirect('activity/' . $activity->slug . '/img')->with('msg', 'Data Foto Kegiatan Max 3');
        }
        $data = $request->validate([
            'img' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_activities'), $name);
            $data['img'] = $name;
        }
        $data['activity_id'] = $activity->id;
        $request->user()->activity_imgs()->create($data);
        return redirect('activity/' . $activity->slug . '/img')->with('msg', 'Data Foto Kegiatan Berhasil di Tambahkan');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit(ActivityImg $activityImg)
    {
        return view('dashboard_edit.activity_img_edit', compact('activityImg'));
    }

    // UPDATE
    public function update(Request $request, ActivityImg $activityImg)
    {
        $data = $request->validate([
            'img' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            File::delete('img_activities/' . $activityImg->img);
            $img->move(public_path('img_activities'), $name);
            $data['img'] = $name;
        }
        ActivityImg::findOrFail($activityImg->id)->update($data);
        return redirect('activity/' . $activityImg->activity->slug . '/img')->with('msg', 'Data Foto Kegiatan Berhasil diedit');
    }

    // DELETE
    public function destroy(ActivityImg $activityImg)
    {
        File::delete('img_activities/' . $activityImg->img);
        ActivityImg::destroy($activityImg->id);
        return redirect()->back()->with('msg', 'Data Foto Kegiatan Berhasil di Hapus');
    }
}
