<?php

namespace App\Http\Controllers;

use App\Models\Mpembelian;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\Unique;
use Nette\Utils\Strings;

use function Laravel\Prompts\table;

class Cpembelian extends Controller
{
    public function tampil()
    {
        $pembelian = DB::table("pembelian")
            ->leftJoin("barang", "pembelian.id_barang", "=", "barang.id_barang")
            ->leftJoin("suplier", "pembelian.id_suplier", "=", "suplier.id_suplier")
            ->select("pembelian.*", "suplier.nama as nama_suplier", "barang.nama as nama_barang")
            ->get();
        return view("pembelian.index", compact("pembelian"));
    }

    public function tambah()
    {
        $judul = "tambah data pembelian";

        $suplier = DB::table("suplier")
            ->select("id_suplier", "nama as nama_suplier")
            ->get();

        $barang = DB::table("barang")
            ->select("id_barang", "nama as nama_barang")
            ->get();

        $kode_pembelian_baru = $this->kode_pembelian();
        return view("pembelian.tambah", compact("judul", "barang", "suplier", "kode_pembelian_baru"));
    }

    public function simpan(Request $request)
    {
        // $request->validate([
        //     "id_pembelian" => "required|Unique"

        // ]);

        Mpembelian::create([
            "id_pembelian" => $request->id_pembelian,
            "id_barang" => $request->id_barang,
            "id_suplier" => $request->id_suplier,
            "qty" => $request->qty,
            "tgl_pembelian" => $request->tgl_pembelian
        ]);

        return redirect()->route("pembelian.tampil")->with("success", "data pemesanan berhasil ditambahkan");
    }

    public function edit(string $id_pembelian)
    {
        $pembelian = DB::table("pembelian")->where("id_pembelian", $id_pembelian)->first();
        $barang = DB::table("barang")
            ->select("id_barang", "nama as nama_barang")
            ->get();

        $suplier = DB::table("suplier")
            ->select("id_suplier", "nama as nama_suplier")
            ->get();

        return view("pembelian.edit", compact("pembelian", "barang", "suplier"));
    }

    public function simpan_edit(Request $request, String $id_pembelian)
    {
        // $request->validate{[

        // ]};

        // Validasi data jika perlu
        $request->validate([
            'id_barang' => 'required',
            'id_suplier' => 'required',
            'qty' => 'required|integer',
            'tgl_pembelian' => 'required|date',
        ]);

        $pembelian = DB::table("pembelian")
            ->where("id_pembelian", $id_pembelian) // gunakan $id_pembelian langsung
            ->update([
                "id_barang" => $request->id_barang,
                "id_suplier" => $request->id_suplier,
                "qty" => $request->qty,
                "tgl_pembelian" => $request->tgl_pembelian,
            ]);

        return redirect()->route("pembelian.tampil")->with("success", "Data pembelian berhasil diedit");
    }

    public function hapus(String $id_pembelian)
    {
        DB::table("pembelian")
            ->where("id_pembelian", $id_pembelian)
            ->delete();

        return redirect()->route("pembelian.tampil")->with("success", "Data pembelian berhasil dihapus");
    }

    public function cetak()
    {
        $pembelian = DB::table("pembelian")
            ->leftJoin("barang", "pembelian.id_barang", "=", "barang.id_barang")
            ->leftJoin("suplier", "pembelian.id_suplier", "=", "suplier.id_suplier")
            ->select("pembelian.*", "suplier.nama as nama_suplier", "barang.nama as nama_barang")
            ->get();
        return view("pembelian.cetak", compact("pembelian"));
    }

    private function kode_pembelian()
    {
        $tahun = date('y');  // mengambil 2 digit tahun y kecil 24 klo Y besa 2024 tgl server
        $bulan = date('m'); // klo M besar akan mengamblil contoh “NOV” tgl server
        $hari = date('d'); // nagmbil hari
        $tahun_bulan = $tahun . $bulan . $hari;

        $nomor_terakhir = Mpembelian::where('id_pembelian', 'like', 'BUY' . $tahun_bulan . '%')
            ->orderBy('id_pembelian', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'BUY' . $tahun_bulan . '-001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pembelian, -3); // klo nilai plus 7 berarti dari kiri ke kana, klo -3 maaka dari kanan ke kiri conoth P2411-001
            $newKodeNumber = $lastKode + 1;
            $newKode = 'BUY' . $tahun_bulan . '-' . str_pad($newKodeNumber, 3, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }
}
