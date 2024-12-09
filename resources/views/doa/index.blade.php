@extends('template.menu')
@section('konten')
<div class="card">
    <div class="card-header">
        <h1>doa</h1>
    </div>
    <div class="card-body">
@if (!empty($doa))
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Doa</th>
            <th>Ayat</th>
            <th>Latin</th>
            <th>Artinya</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doa as $d)
        <tr>
            <td>{{ $d['id'] }}</td>
            <td>{{ $d['doa'] }}</td>
            <td>{{ $d['ayat'] }}</td>
            <td>{{ $d['latin'] }}</td>
            <td>{{ $d['artinya'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-danger">Tidak ada data.</p>
@endif
    </div>
</div>
@endsection