<!DOCTYPE html>
<html>
<head>
    <title>Tambah Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Event Baru</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terdapat kesalahan saat input data.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="form-group">
                <label for="nama_event">Nama Event</label>
                <input type="text" class="form-control" id="nama_event" name="nama_event" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_event">Deskripsi Event</label>
                <textarea class="form-control" id="deskripsi_event" name="deskripsi_event" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="jam_event">Jam Event</label>
                <input type="time" class="form-control" id="jam_event" name="jam_event" required>
            </div>
            <div class="form-group">
                <label for="tgl_event">Tanggal Event</label>
                <input type="date" class="form-control" id="tgl_event" name="tgl_event" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <textarea class="form-control" id="lokasi" name="lokasi" required></textarea>
            </div>
            <div class="form-group">
                <label for="jml_ticket">Jumlah Tiket</label>
                <input type="number" class="form-control" id="jml_ticket" name="jml_ticket" required>
            </div>
            <div class="form-group">
                <label for="hrg_ticket">Harga Tiket</label>
                <input type="number" class="form-control" step="0.01" id="hrg_ticket" name="hrg_ticket" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="1">On Going</option>
                    <option value="0">Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_penyelenggara">Penyelenggara</label>
                <select class="form-control" id="id_penyelenggara" name="id_penyelenggara" required>
                    <option value="">Pilih Penyelenggara</option>
                    @foreach($penyelenggara as $penyel)
                        <option value="{{ $penyel->id }}">{{ $penyel->nama_penyelenggara }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
