<?php

namespace App\Http\Controllers;

use App\Models\Msuplier;
use Illuminate\Http\Request;
use Psy\SuperglobalsEnv;

class Csuplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplier = Msuplier::get();
        $judul = "Tambah data suplier";
        return view("suplier.index", compact("suplier", "judul"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_baru = $this->kode_suplier();
        $judul = "Tambah data Suplier ";
        return view("suplier.tambah", compact("judul", "kode_baru"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // yang di tambah balde php => validasinya banyak cek sendiri
            "id_s" => 'required|string|max:20 |unique:suplier,id_suplier',

        ]);

        Msuplier::create([
            // nama field => di name dalam file tambah .blade.php si suplier
            'id_suplier' => $request->id_s,
            'nama' => $request->nama_s,
            'alamat' => $request->alamat_s,
            'kode_pos' => $request->kode_pos,
            'kota' => $request->kota_s,
        ]);

        // return view("suplier.index");
        return redirect()->route('suplier.index')->with("success", "data suplier berhasil ditambahkan ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Msuplier $msuplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_suplier)
    {
        $suplier = Msuplier::where("id_suplier", $id_suplier)->firstOrFail();
        $judul = "Edit Data suplier id : $suplier->id_suplier nama : $suplier->nama";
        return view('suplier.edit', compact("suplier", "judul"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_suplier)
    {
        $suplier = Msuplier::where("id_suplier", $id_suplier)->firstOrFail();
        // $suplier::update([
        $suplier->update([
            // "nama_filed => $request, dari_name_dihtml_view
            'id_suplier' => $request->id_s,
            'nama' => $request->nama_s,
            "alamat" => $request->alamat_s,
            "kota" => $request->kota_s,
            "kode_pos" => $request->kode_pos,

        ]);

        return redirect()->route('suplier.index')->with("success", "data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_suplier)
    {
        $suplier = Msuplier::where('id_suplier', $id_suplier)->first();
        $suplier->delete();
        return redirect()->route("suplier.index")->with("success", "data suplier berhasil dihapus");
    }

    public function cetak()
    {
        $suplier = Msuplier::get();
        return view('suplier.cetak', compact('suplier'));
    }

    private function kode_suplier()
    {
        $nomor_terakhir = Msuplier::orderBy('id_suplier', 'desc')->first();
        if (!$nomor_terakhir) {
            $kode_baru = 'S-0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_suplier, 2);
            // b0-1111
            //mengambil karateer dan mgunbah menjadi int 1

            $nomor_baru = $lastKode + 1;


            $kode_baru = 'S-' . str_pad($nomor_baru, 4, '0', STR_PAD_LEFT);
        }
        return $kode_baru;
    }
}
