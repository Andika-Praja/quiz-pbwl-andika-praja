@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #000;">GOLONGAN</h2>

    <a href="{{ url('golongan/create') }}" class="btn btn-warning mb-3 float-end">
        <i class="fas fa-circle-plus"></i> Add Golongan
    </a>

    <table class="table table-bordered table-hover" style="border-color: #000;">
        <thead class="bg-warning">
            <tr>
                <th>ID</th>
                <th>KODE</th>
                <th>NAMA</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>

        <tbody>
            @php
                $counter = 1;
            @endphp

            @foreach ($rows as $row)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $row->gol_kode }}</td>
                    <td>{{ $row->gol_nama }}</td>
                    <td>
                        <a href="{{ url('golongan/edit/' . $row->id) }}" class="btn btn-warning">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ url('golongan/' . $row->id) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
