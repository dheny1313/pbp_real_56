<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbarang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = ["id_barang", "nama", "varian", "harga_beli", "harga_jual", "foto"];
}
