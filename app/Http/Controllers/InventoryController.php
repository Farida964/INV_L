<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ======================
    // INDEX
    // ======================
    public function index(): View
    {
        $allInventory = Inventory::all();
        return view('inventory.index', compact('allInventory'));
    }

    // ======================
    // CREATE PRODUCT
    // ======================
    public function create(): View
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        Inventory::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok, // stok awal
            'masuk' => 0,
            'keluar' => 0,
            'harga' => $request->harga,
            'keuntungan' => $request->keuntungan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // ======================
    // EDIT PRODUCT
    // ======================
    public function edit(Inventory $inventory): View
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'harga' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $inventory->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'keuntungan' => $request->keuntungan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Data produk berhasil diperbarui');
    }

    // ======================
    // INPUT STOCK (TRANSAKSI)
    // ======================
    public function input($id): View
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.input', compact('inventory'));
    }

    public function storeInput(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $request->validate([
            'masuk' => 'nullable|integer|min:0',
            'keluar' => 'nullable|integer|min:0',
        ]);

        $masuk  = $request->masuk ?? 0;
        $keluar = $request->keluar ?? 0;

        $stokBaru = $inventory->stok + $masuk - $keluar;

        if ($stokBaru < 0) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        $inventory->update([
            'stok' => $stokBaru,
            'masuk' => $masuk,
            'keluar' => $keluar,
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Stok berhasil diperbarui');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function detail($id)
{
    $inventory = Inventory::findOrFail($id);

    return response()->json([
        'nama' => $inventory->nama,
        'warna' => $inventory->warna,
        'ukuran' => $inventory->ukuran,
        'harga' => $inventory->harga,
        'keuntungan' => $inventory->keuntungan,
    ]);
}
}