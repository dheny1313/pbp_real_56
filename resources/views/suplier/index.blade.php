<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suplier index</title>
</head>

<body>
 
    @extends('template.menu')
    @section('konten')
    
    <div class="card">
        <div class="card-header">
            <h1>hello ini page suplier</h1>
            <a href="{{route('suplier.create')}}"><button class="btn btn-success">tambah data</button></a>
            <a href="{{route('suplier.cetak')}}" title="cetak data suplier" target="_blank"><button class="btn btn-info" ><i class="fa fa-print" ></i>&nbsp;cetak data suplier</button></a>
            <a href="{{route('suplier.export_excel')}}" title="export to excel data suplier" target="_blank" class="btn btn-secondary">&nbsp;export to excel data suplier</a>
        </div>
        <div class="card-body">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>id suplier</th>
                        <th>nama</th>
                        <th>alamat</th>
                        <th>kode pos</th>
                        <th>kota</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suplier as $s)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->id_suplier}}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->alamat}}</td>
                        <td>{{$s->kode_pos}}</td>
                        <td>{{$s->kota}}</td>
                        <td>
                            <form method="post" action="{{ route('suplier.destroy', $s->id_suplier) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-sm btn-danger">Hapus</button>
                                <a  href="{{ route('suplier.edit', $s->id_suplier) }}">
                                    <button type="button" class="btn-sm btn-warning">Edit</button>
                                </a>
                            </form>
                        </td>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
 
    @endsection
</body>

</html>