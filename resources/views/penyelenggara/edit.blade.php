<!-- resources/views/penyelenggara/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Update Penyelenggara')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Update Penyelenggara</h1>
      @include('../layouts.app.successAlert')
      @include('../layouts.app.failedAlert')
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Formulir Update Penyelenggara</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('penyelenggara.update', $penyelenggara->id_penyelenggara) }}"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group row mb-4">
            <label for="nama_penyelenggara" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
              Penyelenggara</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" @error('nama_penyelenggara') is-invalid @enderror"
                name="nama_penyelenggara" value="{{ old('nama_penyelenggara', $penyelenggara->nama_penyelenggara) }}"
                required>
              @error('nama_penyelenggara')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="email_penyelenggara" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email
              Penyelenggara</label>
            <div class="col-sm-12 col-md-7">
              <input type="email" class="form-control" id="email_penyelenggara" name="email_penyelenggara"
                value="{{ $penyelenggara->email_penyelenggara }}" readonly>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label for="username" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="username" name="username"
                value="{{ $penyelenggara->username }}" readonly>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label for="alamat_kantor" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat
              Kantor</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control @error('alamat_kantor') is-invalid @enderror" id="alamat_kantor"
                name="alamat_kantor" value="{{ old('alamat_kantor', $penyelenggara->alamat_kantor) }}" required>
              @error('alamat_kantor')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-4">
            <label for="lisensi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lisensi</label>
            <div class="col-sm-12 col-md-7">
              <input type="file" class="form-control @error('lisensi') is-invalid @enderror" id="lisensi" name="lisensi"
                value="{{ old('lisensi', $penyelenggara->lisensi) }}">
              @error('lisensi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-4">
            <label for="kontak" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kontak</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                value="{{ old('kontak', $penyelenggara->kontak) }}" required>
              @error('kontak')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-4">
            <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
            <div class="col-sm-12 col-md-7">
              <input type="password" class="form-control" id="password" name="password" value="********" readonly>
            </div>
          </div>

          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
@endsection