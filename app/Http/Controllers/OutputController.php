<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
use App\Models\Done; 
use Illuminate\View\View;

class OutputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        $allOutput = Output::all();
        return view('output.index', compact('allOutput'));
    }

    public function create(): View
    {
       $inventory = \App\Models\Inventory::all();
    return view('output.create', compact('inventory'));
    }

   public function store(Request $request)
{
    $validatedData = $request->validate([
        'kode' => 'required',
        'nama' => 'required',
        'warna' => 'required',
        'ukuran' => 'required',
        'masuk' => 'required|integer',
        'keluar' => 'required|integer',
        'harga' => 'required|numeric',
        'keuntungan' => 'required|numeric',
        'keterangan' => 'required',
        'status' => 'required',
        'pembayaran' => 'required',
    ]);

    $inventory = \App\Models\Inventory::where('kode', $request->kode)->first();
    $masuk = $request->input('masuk', 0);
    $keluar = $request->input('keluar', 0);

    // Update stok inventory
    if ($inventory) {
        $inventory->stok = $inventory->stok + $masuk - $keluar;
        $inventory->save();
    }

    // HITUNG OTOMATIS
    $validatedData['jumlahbayar'] = $masuk * $request->harga;
    $validatedData['profit'] = $masuk * $request->keuntungan;

    // Isi stok untuk tabel output
    $validatedData['stok'] = $inventory ? $inventory->stok : ($masuk - $keluar);

    Output::create($validatedData);

    return redirect()->route('output.index')->with('success', 'Data berhasil ditambahkan!');
}


    public function show(Output $output): View
    {
        return view('output.show', compact('output'));
    }

    public function edit(Output $output): View
    {
        return view('output.edit', compact('output'));
    }

    public function update(Request $request, $id)
    {
        $output = Output::findOrFail($id);

        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'warna' => 'required',
            'ukuran' => 'required',
            'masuk' => 'required|integer',
            'keluar' => 'required|integer',
            'harga' => 'required|numeric',
            'keuntungan' => 'required|numeric',
            'keterangan' => 'required',
            'status' => 'required',
            'pembayaran' => 'required',
        ]);

        $validatedData['jumlahbayar'] = $request->masuk * $request->harga;
        $validatedData['profit'] = $request->masuk * $request->keuntungan;

        $output->update($validatedData);

        if ($request->status === "arrive") {
            Done::create($output->toArray());
            $output->delete();

            return redirect()->route('done.index')
                ->with('success', 'Data berhasil dipindahkan ke Done!');
        }

        return redirect()->route('output.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Output $output)
    {
        $output->delete();
        return redirect()->route('output.index')->with('success', 'Data berhasil dihapus!');
    }
}
