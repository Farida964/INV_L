<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $table = 'outputs';
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
