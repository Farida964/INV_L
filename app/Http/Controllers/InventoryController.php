<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        $allInventory = Inventory::all();
        return view('inventory.index', compact('allInventory'));
    }

    public function create(): View
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required|integer',
            'masuk' => 'required|integer',
            'keluar' => 'required|integer',
            'harga' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        Inventory::create($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Inventory $inventory): View
    {
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory): View
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required|integer',
            'masuk' => 'required|integer',
            'keluar' => 'required|integer',
            'harga' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $inventory->update($validatedData);

        return redirect()->route('inventory.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Data berhasil dihapus!');
    }
}
