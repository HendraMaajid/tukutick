<!-- resources/views/event/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>event List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">event List</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="thead-dark">
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
                        <td>{{ $event->kategori->nama_kategori}}</td>
                        <td>{{ $event->penyelenggara->nama_penyelenggara }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
