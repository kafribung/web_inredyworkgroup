<?php

namespace App\Http\Controllers;

// Import DB Class InventoryRequests
use App\Http\Requests\InventoryRequest;

// Import Class STR
use Illuminate\Support\Str;

// Import DB Inventory
use App\Models\Inventory;


class InventoryController extends Controller
{
    // READ
    public function index()
    {
        $inventories = Inventory::with('user')->latest()->get();

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
            $name= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_inventories'), $name);

            $data['img'] = $name;
        }

        $data['slug'] =  Str::slug($request->title);

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
    public function update(InventoryRequest $request, $id)
    {
        $data = $request->all();

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_inventories'), $name);

            $data['img'] = $name;
        }

        $data['slug'] =  Str::slug($request->title);

        Inventory::findOrFail($id)->update($data);

        return redirect('/inventory')->with('msg', 'Data Inventaris Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        Inventory::destroy($id);

        return redirect('/inventory')->with('msg', 'Data Inventaris Berhasil di Hapus');

    }
}
