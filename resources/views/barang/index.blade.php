@extends('template.menu')
@section('konten')
{{-- <script defer>
    new DataTable('#example');
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" type=""></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"> --}}

<div class="card">
    <div class="card-header">
        <h1>Tambah barang
        </h1>
        <a href="{{route('barang.create')}}" class="btn btn-success btn-sm">tambah barang</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <a href="{{route('barang.cetak')}}" class="btn btn-info btn-sm" target="_blank">cetak data barang</a>
        <a href="{{route('barang.excel')}}" class="btn btn-info btn-sm" target=_blank><i class="fa fa-print"></i> export data to excel</a>
    </div>
    <div class="card-body">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>no</th>
                    <th>id barang</th>
                    <th>nama barang</th>
                    <th>varian barang</th>
                    <th>harga beli</th>
                    <th>harga jual</th>
                    <th>foto v:</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->id_barang}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{($item->varian)}}</td>
                    <td>{{rupiah($item->harga_beli)}}</td>
                    <td>{{rupiah($item->harga_jual)}}</td>
                   <td>
                    @if($item->foto)
                    <a href="{{ asset('uploads/foto_barang/' . $item->foto) }}" target=_blank>
                        <img src="{{ asset('uploads/foto_barang/' . $item->foto) }}" style="width: 100px; height: auto;" />
                    </a>
                    @else
                    No foto
                    @endif
                   </td>
                    <td>
                        <form method="POST" onsubmit="return confirm('yakin hapus data?');" action="{{ route('barang.destroy', $item->id_barang) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            <a href="{{ route('barang.edit', $item->id_barang)}}" class="btn btn-warning btn-sm">Edit</a>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection