<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembeli;
use Dotenv\Util\Str;
use GrahamCampbell\ResultType\Success;

class Cpembeli extends Controller
{
    public function tampil()
    {
        $pembeli = Mpembeli::all();
        $judul = "Dashboard Pembeli";
        return view("pembeli.index", compact("pembeli", "judul"));
    }

    public function tambah()
    {
        $kode_pembeli = $this->kode_pembeli();
        $judul = "Dashboard Tambah data Pembeli";
        return view("pembeli.tambah", compact("judul", "kode_pembeli"));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            "id_pembeli" => "required|max:10"
        ]);



        $pembeli = new Mpembeli();
        $pembeli->id_pembeli = $request->id_pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->jns_kelamin = $request->jns_kelamin;
        $pembeli->alamat = $request->alamat_pembeli;
        $pembeli->kode_pos = $request->kode_pos_pembeli;
        $pembeli->kota = $request->kota_pembeli;
        $pembeli->tgl_lahir = $request->tgl_lahir_pembeli;
        $pembeli->save();

        return  redirect()->route("pembeli.tampil")->with("status", ["judul" => "berhasil", "pesan" => "berhasil disimpna", "icon" => "success"]);
    }

    function edit(string $id_pembeli)
    {
        $pembeli = Mpembeli::where("id_pembeli", $id_pembeli)->first();
        $judul = "edit data pembeli id : $pembeli->id_pembeli nama : $pembeli->nama";
        return view("pembeli.edit", compact("pembeli", "judul"));
    }

    function simpan_edit(Request $request, string $id_pembeli)
    {
        $pembeli = Mpembeli::where("id_pembeli", $id_pembeli)->first();
        $pembeli->id_pembeli = $request->id_pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->jns_kelamin = $request->jns_kelamin;
        $pembeli->alamat = $request->alamat_pembeli;
        $pembeli->kode_pos = $request->kode_pos_pembeli;
        $pembeli->kota = $request->kota_pembeli;
        $pembeli->tgl_lahir = $request->tgl_lahir_pembeli;
        $pembeli->save();

        return redirect()->route("pembeli.tampil")->with("status_edit", ["judul" => "berhasil", "pesan" => "berhasil edit data", "icon" => "success"]);
    }

    public function hapus(string $id_pembeli)
    {
        $pembeli = Mpembeli::where("id_pembeli", $id_pembeli)->first();
        $pembeli->delete();
        return redirect()->route("pembeli.tampil")->with("status_hapus", ["judul" => "data berhasil dihapus", "pesan" => "data berhasil dihapus", "icon" => "success"]);
    }

    private function kode_pembeli()
    {
        $tahun = date('y');  // mengambil 2 digit tahun y kecil 24 klo Y besa 2024 tgl server
        $bulan = date('m'); // klo M besar akan mengamblil contoh “NOV” tgl server
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Mpembeli::where('id_pembeli', 'like', 'P' . $tahun_bulan . '%')
            ->orderBy('id_pembeli', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'P' . $tahun_bulan . '-001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pembeli, -3); // klo nilai plus 7 berarti dari kiri ke kana, klo -3 maaka dari kanan ke kiri conoth P2411-001
            $newKodeNumber = $lastKode + 1;
            $newKode = 'P' . $tahun_bulan . '-' . str_pad($newKodeNumber, 3, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak()
    {
        $pembeli = Mpembeli::get();
        return view('pembeli.cetak', compact('pembeli'));
    }
}