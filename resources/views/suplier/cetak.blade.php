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

    
    <h1>Data suplier</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID suplier</th>
                <th>Nama</th>
                <th>alamat</th>
                <th>kode pos</th>
                <th>kota </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suplier as $item)
            <tr>
                <td>{{ $item->id_suplier }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->kode_pos }}</td>
                <td>{{ $item->kota}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>