<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['id_pesanan', 'id_pelanggan', 'id_pembeli', 'id_barang', 'qty', 'tgl_pesan'];
}
