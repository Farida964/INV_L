<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
use App\Models\Done;
use App\Models\Inventory;
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
        $inventories = Inventory::all();
        return view('output.create', compact('inventories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'keluar' => 'required|integer|min:1',
            'pembayaran' => 'required',
            'keterangan' => 'nullable',
        ]);

        $inventory = Inventory::findOrFail($request->inventory_id);

        if ($inventory->stok < $request->keluar) {
            return back()->withErrors(['keluar' => 'Stok tidak mencukupi']);
        }

        Output::create([
            'inventory_id' => $inventory->id,
            'kode' => $inventory->kode,
            'nama' => $inventory->nama,
            'warna' => $inventory->warna,
            'ukuran' => $inventory->ukuran,
            'masuk' => 0,
            'keluar' => $request->keluar,
            'harga' => $inventory->harga,
            'keuntungan' => $inventory->keuntungan,
            'status' => 'on progress',
            'pembayaran' => $request->pembayaran,
            'keterangan' => $request->keterangan,
        ]);

        // Kurangi stok
        $inventory->decrement('stok', $request->keluar);

        return redirect()->route('output.index')
            ->with('success', 'Checkout berhasil');
    }

    public function show(Output $output): View
    {
        return view('output.show', compact('output'));
    }

    public function edit(Output $output): View
    {
        return view('output.edit', compact('output'));
    }

    public function update(Request $request, Output $output)
    {
        $request->validate([
            'status' => 'required',
            'pembayaran' => 'required',
            'keterangan' => 'nullable',
        ]);

        $output->update([
            'status' => $request->status,
            'pembayaran' => $request->pembayaran,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->status === 'arrive') {
            // Map only the fields expected by the `dones` table and provide
            // sensible defaults for columns that may be missing on `outputs`.
            $inventory = Inventory::find($output->inventory_id);

            Done::create([
                'kode' => $output->kode,
                'nama' => $output->nama,
                'warna' => $output->warna,
                'ukuran' => $output->ukuran,
                'stok' => $inventory ? $inventory->stok : 0,
                'masuk' => $output->masuk ?? 0,
                'keluar' => $output->keluar ?? 0,
                'harga' => $output->harga ?? 0,
                'keuntungan' => $output->keuntungan ?? 0,
                'keterangan' => $output->keterangan,
                'status' => $output->status,
                'pembayaran' => $output->pembayaran,
            ]);

            $output->delete();

            return redirect()->route('done.index')
                ->with('success', 'Data dipindahkan ke Done');
        }

        return redirect()->route('output.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Output $output)
    {
        $output->delete();
        return redirect()->route('output.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
