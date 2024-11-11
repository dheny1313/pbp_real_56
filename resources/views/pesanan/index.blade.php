@extends('template.menu')
@section('konten')

<div class="card">
    <div class="card-header">
        <h2>Data Pesanan</h2>
        <a href="{{route ('pesanan.tambah')}}" class="btn btn-sm btn-success">tambah pesanan</a>
        <a href="{{route ('pesanan.cetak')}}" class="btn btn-sm btn-info" target="_blank">cetak data pesanan</a>
        <a href="{{route ('pesanan.cetak_excel')}}" class="btn btn-sm btn-info" target="_blank">cetak_excel data pesanan</a>
    </div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <td>no</td>
                    <td>id_pesanan</td>
                    <td>nama pembeli</td>
                    <td>nama barang</td>
                    <td>qty</td>
                    <td>tanggal pesan</td>
                    <td>aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->id_pesanan}}</td>
                    <td>{{$item->nama_pembeli}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{tanggal($item->tgl_pesan)}}</td>
                    <td>
                        <form onsubmit="return confirm('yakin hapus data pesanan');" action="{{route('pesanan.hapus',$item->id_pesanan)}}" method="post" >
                            @csrf
                            @method('delete')
                            <button type="submit " class="btn btn-danger btn-sm">hapus</button>
                            <a href="{{route("pesanan.edit",$item->id_pesanan)}}" class="btn btn-warning btn-sm">edit</a>
                        </form>
                    </td>
                </tr>
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