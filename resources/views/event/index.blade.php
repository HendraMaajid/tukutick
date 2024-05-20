<!-- resources/views/event/index.blade.php -->

@extends('layouts.app')

@section('title', 'List Event')

@section('content')
    <h1 class="mb-4">Event List</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table id="myTable" class="display table table-bordered"">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Event</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Jam Event</th>
                <th>Tanggal Event</th>
                <th>Lokasi</th>
                <th>Jumlah Ticket</th>
                <th>Harga Ticket</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Penyelenggara</th>
                <th>Aksi</th> <!-- Kolom baru untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach($event as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->deskripsi_event }}</td>
                    <td><img src="{{ asset('storage/events/' . $event->gambar) }}" alt="{{ $event->nama_event }}" width="100"></td>
                    <td>{{ $event->jam_event }}</td>
                    <td>{{ $event->tgl_event }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ $event->jml_ticket }}</td>
                    <td>{{ $event->hrg_ticket }}</td>
                    <td>{{ $event->status }}</td>
                    <td>{{ $event->kategori->nama_kategori }}</td>
                    <td>{{ $event->penyelenggara->nama_penyelenggara }}</td>
                    <td>
                        <a href="{{ route('event.edit', $event->id_event) }}" class="btn btn-warning btn-sm">Update</a>
                        <form action="{{ route('event.destroy', $event->id_event) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
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

