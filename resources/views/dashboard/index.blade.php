<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
</head>
<body>
    @extends('template.menu')
    @section('konten')
        <div class="card">
            @if (session('error'))
                <div class="alert alert-danger" id="flash">
                    {{session('error')}}
                </div>
            @endif
            <div class="card-body">
                <h1>jumlah barang : {{$jumlah_barang}}</h1>
                <h1>jumlah suplier : {{$jumlah_suplier}}</h1>
               <h1>Jumlah pembeli : {{$jumlah_pembeli}}</h1>
            </div> 
            <div>
                <hr class="border border-primary border-3 opacity-75">
            </div>
            <div class="card-body">
                <h6>nama: {{$user->name}}</h6>
                <p>username {{$user->username}}</p>
                <p>pass : {{$user->password}}</p>
                <p>email : {{$user->email}}</p>
            </div> 
        </div>
    @endsection

    <script>
        setTimeout(function() => {
            documnet.getElementById('flash').style.display = 'none'
        }, 3000);
    </script>
</body>
</html>