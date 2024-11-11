<?php

namespace App\Http\Controllers;

use App\Models\Mdashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\DB;

class Cdashboard extends Controller
{
    public function index()
    {
        $dash = new Mdashboard();
        $jumlah_barang = $dash->jumlah_barang();
        $jumlah_pembeli = $dash->jumlah_pembeli();
        $jumlah_suplier = $dash->jumlah_suplier();
        $user = Auth::user(); //mengambil data user yang login
        return view("dashboard.index", compact("jumlah_barang", "jumlah_suplier", "jumlah_pembeli", "user"));
    }
}
