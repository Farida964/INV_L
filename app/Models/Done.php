<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Done extends Model
{
    protected $table = 'dones';
    protected $primaryKey = 'id';
    protected $fillable = [
    'kode',
    'nama',
    'warna',
    'ukuran',
    'stok',
    'masuk',
    'keluar',
    'harga',
    'keuntungan',
    'keterangan',
    'status',
    'pembayaran',
    ];
    use HasFactory;
}
