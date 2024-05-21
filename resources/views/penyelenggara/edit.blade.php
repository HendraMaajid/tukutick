<!-- resources/views/penyelenggara/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Update Penyelenggara')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Penyelenggara</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('penyelenggara.update', $penyelenggara->id_penyelenggara) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_penyelenggara" class="form-label">Nama Penyelenggara</label>
                            <input type="text" class="form-control @error('nama_penyelenggara') is-invalid @enderror" id="nama_penyelenggara" name="nama_penyelenggara" value="{{ old('nama_penyelenggara', $penyelenggara->nama_penyelenggara) }}" required>
                            @error('nama_penyelenggara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email_penyelenggara" class="form-label">Email Penyelenggara</label>
                            <input type="email" class="form-control" id="email_penyelenggara" name="email_penyelenggara" value="{{ $penyelenggara->email_penyelenggara }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $penyelenggara->username }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
                            <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" id="alamat_kantor" name="alamat_kantor" value="{{ old('alamat_kantor', $penyelenggara->alamat_kantor) }}" required>
                            @error('alamat_kantor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lisensi" class="form-label">Lisensi</label>
                            <input type="file" class="form-control @error('lisensi') is-invalid @enderror" id="lisensi" name="lisensi" value="{{ old('lisensi', $penyelenggara->lisensi) }}">
                            @error('lisensi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak', $penyelenggara->kontak) }}" required>
                            @error('kontak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="********" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Penyelenggara</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
