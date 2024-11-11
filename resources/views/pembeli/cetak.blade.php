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

    
    <h1 class="text-center">Data Pembeli</h1>
    <h2 class="text-center">Dheny Cahyono</h2>
    <h4 class="text-center">made by &hearts;</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pembeli</th>
                <th>Nama</th>
                <th>JK</th>
                <th>alamat</th>
                <th>kode pos</th>
                <th>kota</th>
                <th>tanggal lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $item)
            <tr>
                <td>{{ $item->id_pembeli }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jns_kelamin }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->kode_pos }}</td>
                <td>{{ $item->kota }}</td>
                <td>{{tanggal($item->tgl_lahir)}}</td>
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