<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    @extends('template.menu')
    @section('konten')

    <div class="card">
        <div class="card-header">
            <h1>selamat datang di data pembeli</h1>
            <button class="btn btn-sm btn-success">
                <a href="{{route("pembeli.tambah_data")}} " class="text-white">tambah data pembeli</a>
            </button>
            <a href="{{route("pembeli.cetak")}} " class="text-white btn btn-info btn-sm" target="_blank">cetak data pembeli</a>
        </div>
        <div class="card-body">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>id pembeli</th>
                        <th>nama</th>
                        <th>jenis kelamin</th>
                        <th>alamat</th>
                        <th>kode pos</th>
                        <th>tanggal lahir</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pembeli as $d)
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->id_pembeli}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->jns_kelamin}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->kode_pos}}</td>
                        <td>{{tanggal($d->tgl_lahir)}}</td>
                        <td>

                            <form action="{{ route('pembeli.hapus', $d->id_pembeli) }}" method="POST"   onsubmit="return confirm('yakin hapus data?');">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-sm btn-primary" href="{{route('pembeli_edit', $d->id_pembeli)}}">edit</a>&nbsp; &nbsp;
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(session('status'))
    <script>
        Swal.fire({
            title: "{{session('status')['judul']}}",
            text: "{{session('status')['pesan']}}",
            icon: "{{session('status')['icon']}}"
        });
    </script>
    @endif

    @if(session('status_edit'))
    <script>
        Swal.fire({
            title: "{{session('status_edit')['judul']}}",
            text: "{{session('status_edit')['pesan']}}",
            icon: "{{session('status_edit')['icon']}}"
        });
    </script>
    @endif

    @if(session('status_hapus'))
    <script>
        Swal.fire({
            title: "{{session('status_hapus')['judul']}}",
            text: "{{session('status_hapus')['pesan']}}",
            icon: "{{session('status_hapus')['icon']}}"
        });
    </script>
    @endif
    @endsection

</body>


</html>