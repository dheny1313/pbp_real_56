<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    protected $fillable = ["id_pembelian", "id_barang", "id_suplier", "qty", "tgl_pembelian",];
}
