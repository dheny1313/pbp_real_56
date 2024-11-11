<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function PHPUnit\Framework\returnSelf;

class Cbarang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Mbarang::get();
        $judul = "Dashboard Barang";
        return view('barang.index', compact("barang", "judul"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_baru = $this->kode_barang();
        $judul = "Tambah data barang";
        $varianList = DB::table("barang")->distinct()->pluck("varian");
        return view('barang.tambah', compact("judul", "varianList", "kode_baru"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "varian_baru" => 'nullable|string|max:255',
            'varian' => 'nullable|string|exists:barang,varian', // Pastikan varian ada di database
            "id_barang" => 'required|string|max:20 |unique:barang,id_barang',
            "harga_beli" => 'numeric',
            "harga_jual" => 'numeric',
            'foto'            => 'image|mimes:jpeg,jpg,png|max:2048', //maksimal 2MB
        ]);

        // Ambil varian dari input
        $varian = $request->input('varian');
        $varianBaru = $request->input('varian_baru');

        //gunakan varian baru jika diisi
        if ($varianBaru) {
            $varian = $varianBaru;
        }

        $foto = $request->file('foto'); // berisi file dari name di view
        $filename = null;
        if ($foto) {
            $extension     = $foto->getClientOriginalExtension();
            $filename     = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('uploads/foto_barang'), $filename);
            // move(public_path(‘’)  => bawan laaravel
        }


        Mbarang::create([
            'id_barang' => $request->id_barang,
            'nama' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'varian' => $varian,
            'foto' => $filename,
        ]);

        return redirect()->route('barang.index')->with(["success" => "data barang berhasil ditambahkan "]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mbarang $mbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang)
    {
        // $barang = Mbarang::findOrFail($id_barang);
        $barang = Mbarang::where("id_barang", $id_barang)->firstOrFail();
        $varianList = DB::table("barang")->distinct()->pluck("varian");
        $judul = "Dashboard edit data";
        return view("barang.edit", compact('barang', 'varianList', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id_barang)
    // {
    //     // $barang = Mbarang::findOrFail($id_barang);
    //     // $barang = Mbarang::where("id_barang", $id_barang)->first();

    //     $barang = Mbarang::where("id_barang", $id_barang)->firstOrFail();

    //     $foto = $request->file('foto'); // berisi file dari name di view
    //     $filename = null;
    //     if ($foto) {
    //         $extension     = $foto->getClientOriginalExtension();
    //         $filename     = date('YmdHis') . '.' . $extension;
    //         $foto->move(public_path('uploads/foto_barang'), $filename);
    //         // move(public_path(‘’)  => bawan laaravel
    //     }

    //     $barang->update([
    //         "nama" => $request->nama_barang,
    //         "varian" => $request->varian,
    //         "harga_beli" => $request->beli,
    //         "harga_jual" => $request->jual,
    //         "foto" => $filename,
    //     ]);

    //     return redirect()->route('barang.index')->with(["success" => "data barang berhasil di update "]);
    // }

    public function update(Request $request, string $id_barang)
    {
        $barang = Mbarang::where("id_barang", $id_barang)->firstOrFail();

        $foto = $request->file('foto');
        $filename = $barang->foto; // Use existing filename if no new file is uploaded

        if ($foto) {
            $extension = $foto->getClientOriginalExtension();
            $filename = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('uploads/foto_barang'), $filename);
        }

        $barang->update([
            "nama" => $request->nama_barang,
            "varian" => $request->varian,
            "harga_beli" => $request->beli,
            "harga_jual" => $request->jual,
            "foto" => $filename, // Only update if a new file is uploaded
        ]);

        return redirect()->route('barang.index')->with(["success" => "data barang berhasil di update"]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        $barang = Mbarang::where("id_barang", $id_barang)->firstOrFail();
        $barang->delete();
        return redirect()->route("barang.index")->with(["success" => "data barang berhasil berhasil dihapus "]);
    }

    private function kode_barang()
    {
        $nomor_terakhir = Mbarang::orderBy('id_barang', 'desc')->first();
        if (!$nomor_terakhir) {
            $kode_baru = 'B-0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_barang, 2);
            // b0-1111
            //mengambil karateer dan mgunbah menjadi int 1

            $nomor_baru = $lastKode + 1;
            // nomor_baru 1

            $kode_baru = 'B-' . str_pad($nomor_baru, 4, '0', STR_PAD_LEFT);
            //merubah kode baru menjadi B- . 0001
        }
        return $kode_baru;
    }

    public function cetak()
    {
        $barang = Mbarang::get();
        return view('barang.cetak', compact('barang'));
    }

    public function export_excel()
    {
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        // header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=data_barang_dheny_3677.xls");

        $barang = Mbarang::get();
        return view('barang.excel', compact('barang'));
    }
}
