<?php
function tanggal($tanggal)
{
    // Memeriksa apakah tanggal kosong atau tidak valid
    if (empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }

    $bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );

    // Memecah string tanggal
    $pecahkan = explode('-', $tanggal);

    // Memeriksa apakah hasil pemecahan memiliki 3 elemen
    if (count($pecahkan) !== 3) {
        return '-'; // atau bisa mengembalikan pesan kesalahan
    }

    // Mengembalikan tanggal dalam format DD Bulan YYYY
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}




function rupiah($price)
{
    $res = "Rp. " . number_format($price, 0, ",", ".");
    return $res;
}
