@extends('template.menu')
@section('konten')
 

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Data Pembelian</h1>
            <a href="{{route("pembelian.tambah")}}" class="btn btn-success">tambah data</a>
            <a href="{{route("pembelian.cetak")}}" class="btn btn-info">cetak data</a>
            <hr>
        </div>
        <div class="card-body">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>id pembelian</th>
                        <th>nama barang</th>
                        <th>nama suplier</th>
                        <th>qty</th>
                        <th>tgl_beli</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ( $pembelian as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->id_pembelian}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->nama_suplier}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{tanggal($item->tgl_pembelian)}}</td>
                                <td>
                                    <form onsubmit="return confirm('yakin hapus data pembelian');" action="{{route('pembelian.hapus',$item->id_pembelian)}}" method="post" >
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-sm btn-danger" type="submit">hapus</button>
                                        <button class="btn btn-sm btn-warning"><a href="{{route("pembelian.edit",$item->id_pembelian)}}">edit</a></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                   
                </tbody>
            </table>
        </div>
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