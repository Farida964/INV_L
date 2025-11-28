<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Done;
use Illuminate\View\View;

class DoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        $allDone = Done::all();
        return view('done.index', compact('allDone'));
    }

    public function create(): View
    {
        return view('done.create');
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
            'status' => 'required',
            'pembayaran' => 'required',
        ]);

        Done::create($validatedData);

        return redirect()->route('done.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Inventory $inventory): View
    {
        return view('done.show', compact('done'));
    }

    public function edit(Done $done): View
    {
        return view('done.edit', compact('done'));
    }

   public function update(Request $request, $id)
{
    $output = Output::findOrFail($id);

    $output->update($request->all());

    // Jika status arrive → pindahkan ke tabel done
    if ($request->status === "arrive") {

        // Kurangi stok di Inventory
        $inventory = Inventory::where('kode', $output->kode)->first();

        if ($inventory) {
            // Kurangi stok berdasarkan qty keluar
            $inventory->stok = $inventory->stok - $output->keluar;

            // Pastikan stok tidak minus
            if ($inventory->stok < 0) {
                $inventory->stok = 0;
            }

            $inventory->save();
        }

        // Buat data baru di tabel done
        Done::create([
            'kode' => $output->kode,
            'nama' => $output->nama,
            'warna' => $output->warna,
            'ukuran' => $output->ukuran,
            'stok' => $output->stok,
            'masuk' => $output->masuk,
            'keluar' => $output->keluar,
            'harga' => $output->harga,
            'keuntungan' => $output->keuntungan,
            'keterangan' => $output->keterangan,
            'status' => $output->status,
            'pembayaran' => $output->pembayaran,
        ]);

        // Hapus data dari tabel output
        $output->delete();

        return redirect()->route('done.index')
            ->with('success', 'Data berhasil dipindahkan ke Done & stok telah diperbarui!');
    }

    return redirect()->route('output.index')
        ->with('success', 'Data berhasil diperbarui!');
}

    public function destroy(Done $done)
    {
        $done->delete();
        return redirect()->route('done.index')->with('success', 'Data berhasil dihapus!');
    }
}
