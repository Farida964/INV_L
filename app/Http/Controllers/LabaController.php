<?php

namespace App\Http\Controllers;

use App\Models\Done;
use Illuminate\Http\Request;
// Fallback CSV export implemented inline to avoid dependency issues

class LabaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan halaman laba
     */
    public function index()
    {
        $data = $this->getLabaData();

        return view('laba.index', compact('data'));
    }

    /**
     * Download laporan Excel
     */
    public function downloadReport()
    {
        $data = $this->getLabaData();

        $fileName = 'laporan-laba-' . date('d-m-Y') . '.csv';

        // Use UTF-8 BOM so Excel recognizes encoding, and semicolon delimiter for locales
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ];

        $callback = function () use ($data) {
            $handle = fopen('php://output', 'w');

            // Write UTF-8 BOM
            fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Headings (semicolon delimiter)
            fputcsv($handle, [
                'Tanggal',
                'Produk',
                'Qty',
                'Atas Nama',
                'Total Pembayaran',
                'Keuntungan',
                'Total Keuntungan',
            ], ';');

            foreach ($data as $item) {
                // Format numeric values for readability (no currency symbol)
                $totalPembayaran = is_numeric($item->total_pembayaran) ? number_format($item->total_pembayaran, 0, ',', '.') : $item->total_pembayaran;
                $totalKeuntungan = is_numeric($item->total_keuntungan) ? number_format($item->total_keuntungan, 0, ',', '.') : $item->total_keuntungan;
                $runningTotal = is_numeric($item->running_total) ? number_format($item->running_total, 0, ',', '.') : $item->running_total;

                fputcsv($handle, [
                    $item->created_at->format('d-m-Y'),
                    $item->nama,
                    $item->keluar,
                    $item->keterangan,
                    $totalPembayaran,
                    $totalKeuntungan,
                    $runningTotal,
                ], ';');
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Ambil & hitung data laba (dipakai index + export)
     */
    private function getLabaData()
    {
        $data = Done::orderBy('created_at', 'asc')->get();

        $runningTotal = 0;

        foreach ($data as $item) {

            // Total pembayaran
            $item->total_pembayaran = $item->keluar * $item->harga;

            // Keuntungan per transaksi
            $item->total_keuntungan = $item->keluar * $item->keuntungan;

            // Running total keuntungan
            $runningTotal += $item->total_keuntungan;
            $item->running_total = $runningTotal;
        }

        return $data;
    }
}
