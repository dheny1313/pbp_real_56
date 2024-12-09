
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>id suplier</th>
            <th>nama suplier</th>
            <th>alamat</th>
            <th>kode pos</th>
            <th>kota</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suplier as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->id_suplier}}</td>
            <td>{{$item->nama}}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{$item->kode_pos}}</td>
            <td>{{$item->kota}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
