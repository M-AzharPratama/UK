@extends('layouts.template')

@section('content')
<form action="{{ route('late.store') }}" method="post" class="card p-5" enctype="multipart/form-data">
    @csrf

    <!-- Tambahkan pesan sukses atau pesan kesalahan yang sesuai -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Input untuk memilih data siswa -->
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Siswa:</label>
        <div class="col-sm-10">
        <select name="name" id="name" class="form-select">
          <option selected disabled hidden>Pilih</option>
          @foreach ($students as $item)
          <option value="{{$item->id}}">{{$item->name}} </option>
          @endforeach
          </select>
      </div>
      </div>

    <!-- Input untuk tanggal keterlambatan -->
    <div class="mb-3 row">
        <label for="date" class="col-sm-2 col-form-label">Tanggal Keterlambatan :</label>
        <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late">
        </div>
    </div>

    <!-- Input untuk keterangan keterlambatan -->
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="information" name="information" rows="3"></textarea>
        </div>
    </div>

    <!-- Input untuk mengunggah foto -->
    <div class="mb-3 row">
        <label for="photo" class="col-sm-2 col-form-label">Unggah Bukti (Foto) :</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="bukti" name="bukti">
        </div>
    </div>

    <!-- Tombol untuk menambahkan data -->
    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection
