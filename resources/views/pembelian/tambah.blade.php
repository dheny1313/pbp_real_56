@extends("template.menu")
@section("{{$judul}}")
@section("konten")

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>tambah data pembeli</h1>
        </div>
        <div class="card-body">
            <form action="{{route("pembelian.simpan")}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">ID pembelian</label>
                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" readonly value="{{$kode_pembelian_baru}}" >
                    @error('id_pembelian') {{message}} @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nama barang" class="form-label">Nama Barang</label>
                    <select name="id_barang" id="" class="form-control">
                        <option value="">pilih barang</option>
                        @foreach ($barang as $item)
                            <option value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                        @endforeach
                    </select>
                    @error('id_barang')
                        {{message}}
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="suplier">nama suplier</label>
                    <select name="id_suplier" id="" class="form-control">
                        <option value="">pilih suplier</option>
                        @foreach ($suplier as $s)
                            <option value="{{$s->id_suplier}}">{{$s->nama_suplier}}</option>
                        @endforeach
                    </select>
                    @error('id_suplier')
                        {{message}}
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="qtyPpembelian">qty</label>
                    <input type="number" name="qty" id="" class="form-control">
                    @error('qty')
                        {{message}}
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="tgl_pembelian">Tanggal Pembelian</label><br>
                    <input type="date" name="tgl_pembelian" id="" >
                  </div>
                  
                <button class="btn btn-primary" type="submit">simpan</button>
                <a class="btn btn-warning" href="{{route("pembelian.tampil")}}">kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection