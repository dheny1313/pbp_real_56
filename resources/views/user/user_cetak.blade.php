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
    {{ old('name', $user->name) }}
</body>


<script>
    function closeWindow() {
        window.close();
    }
</script>