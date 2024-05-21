<!-- resources/views/penyelenggara/index.blade.php -->

@extends('layouts.app')

@section('title', 'List Penyelenggara')

@section('content')
    <h1 class="mb-4">Penyelenggara List</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table id="myTable" class="display table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyelenggara</th>
                <th>Alamat Kantor</th>
                <th>Kontak</th>
                <th>Lisensi</th>
                <th>Aksi</th> <!-- Kolom baru untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach($penyelenggara as $penyel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penyel->nama_penyelenggara }}</td>
                    <td>{{ $penyel->alamat_kantor }}</td>
                    <td>{{ $penyel->kontak }}</td>
                    <td>
                        <a href="{{ asset('storage/lisensi/' . $penyel->lisensi) }}" target="_blank">Download PDF</a>
                    </td>

                    <td>
                        <a href="{{ route('penyelenggara.edit', $penyel->id_penyelenggara) }}" class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('penyelenggara.destroy', $penyel->id_penyelenggara) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this penyelenggara?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
