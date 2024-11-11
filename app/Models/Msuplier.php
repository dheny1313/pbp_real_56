<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msuplier extends Model
{
    protected $table = "suplier";
    protected $fillable = ["id_suplier", "nama", "alamat", "kode_pos", "kota"];
    use HasFactory;
}
