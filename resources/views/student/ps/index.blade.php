@extends('layouts.template')

@section('content')
<table class="table table-stripped table-bordered">
<thead>
<tr>
<th>No</th>
<th>Nis</th>
<th>Nama</th>
<th>Rombel</th>
<th>Rayon</th>
</tr>
</thead>
<tbody>
@foreach ($students as $student)
<tr>
{{-- menampilkan angka urutan berdasarkan page pagination (digunakan ketika mengambil data dengan paginate/ simplePaginate) --}}
<td>{{ ($student->currentpage()-1) * $students->perpage() + $loop->index + 1}}</td>
<td>{{ $student->nis }}</td>
<td>{{ $student->name }}</td>
<td>{{ $student->rombel_id }}</td>
<td>{{ $student->rayon_id }}</td>
    @endforeach
    </tbody>
    </table>
    @endsection