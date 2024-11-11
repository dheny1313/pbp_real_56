<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mdashboard extends Model
{
    use HasFactory;
    public function jumlah_suplier()
    {
        return DB::table('suplier')->count();
    }
    public function jumlah_barang()
    {
        return DB::table('barang')->count();
    }

    public function jumlah_pembeli()
    {
        return DB::table('pembeli')->count();
    }
}
