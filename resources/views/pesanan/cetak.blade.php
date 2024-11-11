
{{-- buat cetak pdf bukan excel --}}
<head>
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


<style>
    @media print {
        @page {
            size: A4;
            margin-top: 20mm;
            margin-bottom: 20mm;
            margin-left: 20mm;
            margin-right: 20mm;
        }

        body {
            margin: 0;
            -webkit-print-color-adjust: exact;
        }
    }
</style>

</head>

<body onload="window.print(); window.onafterprint = closeWindow;">

    
    <h1 class="text-center">Data Pesanan</h1>
    <h2 class="text-center">Dheny Cahyono</h2>
    <h4 class="text-center">made by &hearts;</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>nama pelanggan</th>
                <th>nama barang</th>
                <th>qty</th>
                <th>tanggal pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $item)
            <tr>
                <td>{{ $item->id_pesanan }}</td>
                <td>{{ $item->nama_pembeli }}</td>
                <td>{{ $item->nama_barang}}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->tgl_pesan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>


<script>
    function closeWindow() {
        window.close();
    }
</script>