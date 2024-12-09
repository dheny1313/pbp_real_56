@extends('template.menu')
@section('konten')
    <div class="card">
        <div class="card-header">
            <h1>data buku API</h1>
            <p>Tugas Dheny Cahyono </p>
            <p>api : books </p>
            <a href="https://softwium.com/api/books" target="blank">link api : https://softwium.com/api/books</a>
        </div>
        <div class="card-body">
    @if (!empty($books))
    <table id="example" class="table table-bordered">
        <thead>
            <tr>
                <td>no</td>
                <td>judul</td>
                <td>isbn</td>
                <td>jumlah halaman</td>
                <td>penulis</td>
            </tr>
        </thead>
        <tbody>
             @foreach ($books as $b)
                 <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b['title']}}</td>
                    <td>{{$b['isbn']}}</td>
                    <td>{{$b['pageCount']}}</td>
                    <td>
                        {{implode(', ', $b['authors'])}}                     
                    </td>
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