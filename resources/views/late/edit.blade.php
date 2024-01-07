@extends('layouts.template')

@section('content')
    <form action="{{ route('late.update', $lates['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif


        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Nama Siswa :</label>
            <div class="col-sm-10">
              <!-- Input untuk memilih data siswa -->
              <select name="id" id="id" class="form-select">
                <option selected disabled hidden>Pilih Siswa</option>
                <option value="siswa1">Nama Siswa 1</option>
                <option value="siswa2">Nama Siswa 2</option>
                <!-- Tambahkan opsi untuk semua siswa yang relevan -->
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Tanggal Keterlambatan :</label>
            <div class="col-sm-10">
              <!-- Input untuk tanggal keterlambatan -->
              <input type="date" class="form-control" id="date_time_late" name="date_time_late" value="{{ $lates['date'] }}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
              <!-- Input untuk keterangan keterlambatan -->
              <textarea class="form-control" id="information" name="information" rows="3" value="{{ $lates['information'] }}"></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="photo" class="col-sm-2 col-form-label">Unggah Bukti (Foto) :</label>
            <div class="col-sm-10">
              <!-- Input untuk mengunggah foto -->
              <input type="file" class="form-control" id="bukti" name="bukti" value="{{ $lates['bukti'] }}">
            </div>
          </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection