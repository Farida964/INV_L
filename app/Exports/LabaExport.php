<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
 


class LabaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data)->map(function ($item) {
            return [
                $item->created_at->format('d-m-Y'),
                $item->nama,
                $item->keluar,
                $item->keterangan,
                $item->total_pembayaran,
                $item->total_keuntungan,
                $item->running_total,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Produk',
            'Qty',
            'Atas Nama',
            'Total Pembayaran',
            'Keuntungan',
            'Total Keuntungan',
        ];
    }
}
