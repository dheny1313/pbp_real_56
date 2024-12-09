<?php

namespace App\Http\Controllers;

use App\Models\Mpesanan;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;
use PHPUnit\Framework\Attributes\IgnoreFunctionForCodeCoverage;
use ReflectionFunctionAbstract;

namespace App\Http\Controllers;

use App\Models\Mpesanan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//ini buat excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

use function PHPUnit\Framework\returnSelf;

class Cpesanan extends Controller
{
    public function tampil(Request $request)
    {
        $query = DB::table('pesanan')
            ->leftjoin('pembeli', 'pesanan.id_pelanggan', '=', 'pembeli.id_pembeli')
            ->leftjoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
            ->orderBy('pesanan.tgl_pesan', 'DESC');

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('pesanan.tgl_pesan', [$request->dari, $request->sampai]);
        }

        $pesanan = $query->get();


        return view('pesanan.index', compact('pesanan'));
    }

    public function tambah()
    {

        $judul = "tambah data pesanan";
        $pembeli = DB::table('pembeli')
            ->select('id_pembeli', 'nama')
            ->get();

        $barang = DB::table('barang')
            ->select('id_barang', 'nama as nama_barang')
            ->get();

        $kode_pesanan_baru = $this->kode_pesanan();
        return view('pesanan.tambah', compact('pembeli', 'barang', 'judul', 'kode_pesanan_baru'));
    }

    public function simpan(Request $request)
    {
        // $request->validate([
        //     "id_pesanan" => "required|unique",
        // ]);

        Mpesanan::create([
            "id_pesanan" => $request->id_pesanan,
            "id_pelanggan" => $request->id_pembeli,
            "id_barang" => $request->id_barang,
            "qty" => $request->qty,
            "tgl_pesan" => $request->tgl_pesan,
        ]);

        return redirect()->route('pesanan.tampil')->with("success", "data berhasil ditambah");
    }

    public function edit(string $id_pesanan)
    {
        // $pesanan = DB::table('pesanan')
        //     ->where('id_pesanan', $id_pesanan)
        //     ->leftjoin('pembeli', 'pesanan.id_pelanggan', '=', 'pembeli.id_pembeli')
        //     ->leftjoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
        //     ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
        //     ->first();
        $pembeli = DB::table('pembeli')
            ->select('id_pembeli', 'nama')
            ->get();

        $barang = DB::table('barang')
            ->select('id_barang', 'nama as nama_barang')
            ->get();
        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->firstOrFail();
        $judul = "edit data pesanan";
        return view("pesanan.edit", compact('pesanan', 'judul', 'barang', 'pembeli'));
    }

    public function simpan_edit(Request $request, String $id_pesanan)
    {
        $request->validate([
            // 
        ]);

        $pesanan = Mpesanan::where("id_pesanan", $id_pesanan)->firstOrFail();
        $pesanan->update([
            "id_pesanan" => $request->id_pesanan,
            "id_pelanggan" => $request->id_pembeli,
            "id_barang" => $request->id_barang,
            "qty" => $request->qty,
            "tgl_pesan" => $request->tgl_pesan,
        ]);

        return redirect()->route('pesanan.tampil')->with("success", "data pesanan berhasil diupdate");
    }

    public function hapus(String $id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->firstOrFail();
        $pesanan->delete();
        return redirect()->route("pesanan.tampil")->with("success", "data berhasil dihapus");
    }

    public function cetak(Request $request)
    {
        $query = DB::table('pesanan')
            ->leftJoin("pembeli", "pesanan.id_pelanggan", "=", "pembeli.id_pembeli")
            ->leftJoin("barang", "pesanan.id_barang", "=", "barang.id_barang")
            ->select("pesanan.*", "barang.nama as nama_barang", "pembeli.nama as nama_pembeli");

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tgl_pesan', [$request->dari, $request->sampai]);
        }


        $pesanan = $query->get();

        return view('pesanan.cetak', compact('pesanan'));
    }

    private function kode_pesanan()
    {
        $tahun = date('y');  // mengambil 2 digit tahun y kecil 24 klo Y besa 2024 tgl server
        $bulan = date('m'); // klo M besar akan mengamblil contoh “NOV” tgl server
        $hari = date('d'); // nagmbil hari
        $tahun_bulan = $tahun . $bulan . $hari;

        $nomor_terakhir = Mpesanan::where('id_pesanan', 'like', 'R' . $tahun_bulan . '%')
            ->orderBy('id_pesanan', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'R' . $tahun_bulan . '-001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pesanan, -3); // klo nilai plus 7 berarti dari kiri ke kana, klo -3 maaka dari kanan ke kiri conoth P2411-001
            $newKodeNumber = $lastKode + 1;
            $newKode = 'R' . $tahun_bulan . '-' . str_pad($newKodeNumber, 3, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak_excel()
    {
        // Ambil data yang akan diexport
        // $data = Mpesanan::select('id_pesanan', 'id_pelanggan', 'id_pembeli', 'id_barang', 'qty', 'tgl_pesan')->get();
        // $data = Mpesanan::get();
        $data = DB::table('pesanan')
            ->leftjoin('pembeli', 'pesanan.id_pelanggan', '=', 'pembeli.id_pembeli')
            ->leftjoin('barang', 'pesanan.id_barang', '=', 'barang.id_barang')
            ->select('pesanan.*', 'barang.nama as nama_barang', 'pembeli.nama as nama_pembeli')
            ->get();

        // Buat instance Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->mergeCells('A1:F1');  // Menggabungkan sel A1 hingga B1 untuk judul
        // Style untuk judul
        $sheet->setCellValue('A1', "Data Pesanan Dheny Cahyono")
            ->getStyle('A1')->applyFromArray([
                'font' => [
                    'bold' => true,
                    'size' => 16,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);
        // Set header kolom
        $sheet->setCellValue('A2', 'ID Pesanan');
        $sheet->setCellValue('B2', 'ID Pembeli');
        $sheet->setCellValue('C2', 'nama pembeli');
        $sheet->setCellValue('D2', 'nama barang');
        $sheet->setCellValue('E2', 'Quantity');
        $sheet->setCellValue('F2', 'Tanggal Pesan');

        // Isi data mulai dari baris kedua
        $row = 3;
        foreach ($data as $pesanan) {
            $sheet->setCellValue('A' . $row, $pesanan->id_pesanan);
            $sheet->setCellValue('B' . $row, $pesanan->id_pelanggan);
            $sheet->setCellValue('C' . $row, $pesanan->nama_pembeli);
            $sheet->setCellValue('D' . $row, $pesanan->nama_barang);
            $sheet->setCellValue('E' . $row, $pesanan->qty);
            $sheet->setCellValue('F' . $row, $pesanan->tgl_pesan);
            $row++;
        }

        //auto size column
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        // Menambahkan border ke cell
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:F1')->applyFromArray($styleArray);

        // Simpan file Excel ke dalam format download
        $writer = new Xlsx($spreadsheet);
        $fileName = 'data_pesanan_dheny.xlsx';

        // Set header untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
