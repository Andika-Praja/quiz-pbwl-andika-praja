@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #000;">PELANGGAN</h2>

    <a href="{{ route('pel_create') }}" class="btn btn-warning mb-3 float-end">
        <i class="fas fa-circle-plus"></i> Add Pelanggan
    </a>

    <table class="table table-bordered table-hover" style="border-color: #000;">
        <thead class="bg-warning">
            <tr>
                <th>NO</th>
                <th>GOLONGAN</th>
                <th>NO PELANGGAN</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>NO HP</th>
                <th>KTP</th>
                <th>SERI</th>
                <th>METERAN</th>
                <th>AKTIF</th>
                <th>USER</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>

        <tbody>
            @php
                $counter = 1; // Inisialisasi variabel counter
            @endphp

            @foreach ($rows as $row)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $row->golongan->gol_nama }}</td>
                    <td>{{ $row->pel_no }}</td>
                    <td>{{ $row->pel_nama }}</td>
                    <td>{{ $row->pel_alamat }}</td>
                    <td>{{ $row->pel_hp }}</td>
                    <td>{{ $row->pel_ktp }}</td>
                    <td>{{ $row->pel_seri }}</td>
                    <td>{{ $row->pel_meteran }}</td>
                    <td>{{ $row->pel_aktif }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>
                        <a href="{{ url('pelanggan/edit/' . $row->id) }}" class="btn btn-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('pel_delete', ['id' => $row->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
