@extends('template.menu')
@section('konten')

<div class="card">
    <div class="card-header">
        <h2>Data Pesanan</h2>
        <a href="{{route ('pesanan.tambah')}}" class="btn btn-sm btn-success">tambah pesanan</a>
        <a href="{{route ('pesanan.cetak')}}" class="btn btn-sm btn-info" target="_blank">cetak data pesanan</a>
        <a href="{{route ('pesanan.cetak_excel')}}" class="btn btn-sm btn-info" target="_blank">cetak_excel data pesanan</a>

        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#filterModal">
            <i class="fa fa-print"></i>&nbsp;Cetak Data by filter
        </button>
    
        {{-- tombol filter --}}
        <form method="GET" action="{{ route('pesanan.tampil') }}" class="mb-3">
            Dari :
            <input type="date" name="dari" value="{{ request('dari') }}">
            Sampai :
            <input type="date" name="sampai" value="{{ request('dari') }}">
            <button type="submit">Filter</button>
        </form>

        {{-- onchange --}}
        <form id="filterForm" method="GET" action="{{ route('pesanan.tampil') }}">
            Dari :
            <input type="date" name="dari" id="dari" value="{{ request('dari') }}" onchange="this.form.submit()">
            Sampai :
            <input type="date" name="sampai" id="sampai" value="{{ request('sampai') }}" onchange="this.form.submit()">
            </form>
            
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


<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" 
	aria-labelledby="filterModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Pilih Tanggal untuk Cetak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="{{ route('pesanan.cetak') }}" target=_blank>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dari">Dari:</label>
                        <input type="date" class="form-control" id="dari" name="dari" required>
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai:</label>
                        <input type="date" class="form-control" id="sampai" name="sampai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection