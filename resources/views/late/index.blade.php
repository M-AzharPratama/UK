@extends('layouts.template')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <div class="p-2" style="margin-right: 925px">
        <a href="{{ route('late.create')}}" class="btn btn-secondary">Tambah</a>
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Information</th>
            <th>Bukti</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($lates as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['student']['name'] ?? 'Data tidak tersedia' }}</td>
            <td>{{ $item['date_time_late'] }}</td>
            <td>{{ $item['information'] }}</td>
            <td>
                <!-- Menampilkan gambar menggunakan tag img -->
                {{-- <img src="{{ route('late.image.display', ['filename' => $item['bukti']]) }}" alt="Gambar"> --}}
            </td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('late.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                <form action="{{ route('late.delete', $item['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
