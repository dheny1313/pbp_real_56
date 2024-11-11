<head>
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
{{-- ada css karena supaya ada css nya kebawa
ga perlu extends --}}

{{-- style ini buat langsung default margin,, sebernya masih bisa diatur lwat aplikasi cetak atau custom margin --}}
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
    <h1 class="text-center">Data Barang</h1>
    <h2 class="text-center">Dheny Cahyono</h2>
    <h4 class="text-center">made by &hearts;</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
            <tr>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga_beli }}</td>
                <td>{{ $item->harga_jual }}</td>
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