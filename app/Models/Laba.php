<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laba extends Model
{
    protected $table = 'labas';
    protected $primaryKey = 'id';
    protected $fillable = [
    'tanggal',
    'produkpembelian',
    'qty',
    'an',
    'totalpembayaran',
    'keuntungan',
    'totalkeuntungan',
    ];
    use HasFactory;
}
