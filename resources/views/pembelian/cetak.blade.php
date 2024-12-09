{{-- <head>
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

    
    <h1>Data Pembelian</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Nama suplier</th>
                <th>nama barang</th>
                <th>qty</th>
                <th>tanggal pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $item)
            <tr>
                <td>{{ $item->id_pembelian }}</td>
                <td>{{ $item->nama_suplier }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->tgl_pembelian }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body> --}}

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
        
        body {
            font-family: 'Courier New', Courier, monospace;
        }
        
        .table th, .table td {
            text-align: left;
            border-top: 1px dashed #000;
        }
        
        .table thead th {
            border-bottom: 2px solid #000;
        }

        h1 {
            text-align: center;
        }

        .shopping-notes {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px dashed #000;
        }
    </style>
</head>

<body onload="window.print(); window.onafterprint = closeWindow();">

    <div class="shopping-notes">
        <h1>Data Pembelian</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pembelian</th>
                    <th>Nama Suplier</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Tanggal Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $item)
                <tr>
                    <td>{{ $item->id_pembelian }}</td>
                    <td>{{ $item->nama_suplier }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ tanggal($item->tgl_pembelian)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>
