@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Penyelenggara Baru</h2>
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
        <form action="{{ route('penyelenggara.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="nama_penyelenggara" class="form-label">Nama Penyelenggara</label>
                <input type="text" class="form-control" id="nama_penyelenggara" name="nama_penyelenggara" required>
            </div>
            <div class="mb-3">
                <label for="email_penyelenggara" class="form-label">Email Penyelenggara</label>
                <input type="email" class="form-control" id="email_penyelenggara" name="email_penyelenggara" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
                <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" required></textarea>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
            <div class="mb-3">
                <label for="lisensi" class="form-label">Lisensi</label>
                <input type="text" class="form-control" id="lisensi" name="lisensi" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
