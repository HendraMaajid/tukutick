<!-- resources/views/event/tambahevent.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')
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
            <div class="mb-3">
                <label for="nama_event" class="form-label">Nama Event</label>
                <input type="text" class="form-control" id="nama_event" name="nama_event" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_event" class="form-label">Deskripsi Event</label>
                <textarea class="form-control" id="deskripsi_event" name="deskripsi_event" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="mb-3">
                <label for="jam_event" class="form-label">Jam Event</label>
                <input type="time" class="form-control" id="jam_event" name="jam_event" required>
            </div>
            <div class="mb-3">
                <label for="tgl_event" class="form-label">Tanggal Event</label>
                <input type="date" class="form-control" id="tgl_event" name="tgl_event" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <textarea class="form-control" id="lokasi" name="lokasi" required></textarea>
            </div>
            <div class="mb-3">
                <label for="jml_ticket" class="form-label">Jumlah Tiket</label>
                <input type="number" class="form-control" id="jml_ticket" name="jml_ticket" required>
            </div>
            <div class="mb-3">
                <label for="hrg_ticket" class="form-label">Harga Tiket</label>
                <input type="number" class="form-control" step="0.01" id="hrg_ticket" name="hrg_ticket" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_penyelenggara" class="form-label">Penyelenggara</label>
                <select class="form-control" id="id_penyelenggara" name="id_penyelenggara" required>
                    <option value="">Pilih Penyelenggara</option>
                    @foreach($penyelenggara as $penyel)
                        <option value="{{ $penyel->id_penyelenggara }}">{{ $penyel->nama_penyelenggara }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
