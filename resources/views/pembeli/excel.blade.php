<table>
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
            <td>{{$d->tgl_lahir}}</td>
        </tr>
    </tbody>
</table>