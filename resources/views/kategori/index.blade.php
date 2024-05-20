@extends('layouts.app')

@section('title', 'List Kategori')

@section('content')
    <h1 class="mb-4">Kategori List</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table id="myTable" class="display table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th> <!-- Kolom baru untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this kategori?')">Delete</button>
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

