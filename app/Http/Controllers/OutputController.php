<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
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
        return view('output.create');
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

        Output::create($validatedData);

        return redirect()->route('output.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Inventory $inventory): View
    {
        return view('output.show', compact('output'));
    }

    public function edit(Output $output): View
    {
        return view('output.edit', compact('output'));
    }

    public function update(Request $request, Output $output)
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

        $output->update($validatedData);

        return redirect()->route('output.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Output $output)
    {
        $output->delete();
        return redirect()->route('output.index')->with('success', 'Data berhasil dihapus!');
    }

}
