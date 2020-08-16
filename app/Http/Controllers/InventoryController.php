<?php

namespace App\Http\Controllers;

// Import DB Class InventoryRequests
use App\Models\Inventory;
// Import Class STR
use Illuminate\Support\Str;
// Import DB Inventory
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\InventoryRequest;

class InventoryController extends Controller
{
    // READ
    public function index()
    {
        $search = urldecode(request('search'));
        if ($search)
            $inventories = Inventory::with('user')->latest()->where('title', 'like', '%' . $search . '%')->paginate(10);
        else
            $inventories = Inventory::with('user')->latest()->paginate(10);
        return view('dashboard.inventory', compact('inventories'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.inventory_create');
    }

    // STORE
    public function store(InventoryRequest $request)
    {
        $data = $request->all();
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_inventories'), $name);
            $data['img'] = $name;
        }
        $data['slug'] =  Str::slug($request->code);
        $request->user()->inventories()->create($data);
        return redirect('/inventory')->with('msg', 'Data Inventaris Berhasil di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $inventory = Inventory::where('slug', $slug)->first();
        return view('dashboard_edit.inventory_edit', compact('inventory'));
    }

    //
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'img'   => ['required', 'mimes:png,jpg,jpeg'],
            'code'  => ['string', 'min:3', 'max:10'],
            'owner' => ['required', 'string', 'min:3', 'max:150'],
            'total' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'condition' => ['required', 'string'],
            'description' => ['required', 'min:5'],
        ]);
        $inventory = Inventory::findOrFail($id);
        if ($request->has('img')) {
            $img = $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            if ($inventory->img  != 'default_invenrory.jpg') {
                File::delete('img_inventories/' . $inventory->img);
            }
            $img->move(public_path('img_inventories'), $name);
            $data['img'] = $name;
        }
        if ($inventory->code != null) {
            $data['code'] = $request->code . '-' . time();
        }
        $data['slug'] =  Str::slug($request->code);
        $inventory->update($data);
        return redirect('/inventory')->with('msg', 'Data Inventaris Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        if ($inventory->img  != 'default_invenrory.jpg') {
            File::delete('img_inventories/' . $inventory->img);
        }
        Inventory::destroy($id);
        return redirect('/inventory')->with('msg', 'Data Inventaris Berhasil di Hapus');
    }
}
