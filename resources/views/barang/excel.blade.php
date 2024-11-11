<h1>data barang excel :dheny cahyono</h1>
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>id barang</th>
            <th>nama barang</th>
            <th>varian barang</th>
            <th>harga beli</th>
            <th>harga jual</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->id_barang}}</td>
            <td>{{$item->nama}}</td>
            <td>{{ $item->varian }}</td>
            <td>{{$item->harga_beli}}</td>
            <td>{{$item->harga_jual}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
