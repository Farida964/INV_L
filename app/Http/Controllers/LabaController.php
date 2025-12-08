<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laba;
use App\Models\Done;
use Illuminate\View\View;

class LabaController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
         // Ambil semua data done
    $data = Done::orderBy('created_at', 'asc')->get();

    $runningTotal = 0;

    foreach ($data as $item) {

        // 1. Hitung total pembayaran (qty x harga)
        $item->total_pembayaran = $item->keluar * $item->harga;

        // 2. Hitung total keuntungan per transaksi (qty x keuntungan per item)
        $profit_per_transaksi = $item->keluar * $item->keuntungan;

        // Tambahkan ke running total
        $runningTotal += $profit_per_transaksi;

        // Simpan untuk ditampilkan di blade
        $item->total_keuntungan = $profit_per_transaksi;
        $item->running_total = $runningTotal;
    }

    return view('laba.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'produkpembelian' => 'required',
            'qty' => 'required|numeric',
            'an' => 'required',
            'totalpembayaran' => 'required|integer',
            'keuntungan' => 'required|integer',
            'totalkeuntungan' => 'required|integer',
        ]);

        Laba::create($validatedData);

        return redirect()->route('laba.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Inventory $inventory): View
    {
        return view('laba.show', compact('laba'));
    }

    public function edit(Laba $laba): View
    {
        return view('laba.edit', compact('laba'));
    }

    public function update(Request $request, Laba $laba)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'produkpembelian' => 'required',
            'qty' => 'required|numeric',
            'an' => 'required',
            'totalpembayaran' => 'required|integer',
            'keuntungan' => 'required|integer',
            'totalkeuntungan' => 'required|integer',
            ]);

        $laba->update($validatedData);

        return redirect()->route('laba.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Laba $laba)
    {
        $laba->delete();
        return redirect()->route('laba.index')->with('success', 'Data berhasil dihapus!');
    }
}
