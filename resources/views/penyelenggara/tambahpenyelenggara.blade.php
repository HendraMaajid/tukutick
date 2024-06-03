@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Penyelenggara Baru</h1>
      @include('../layouts.app.successAlert')
      @include('../layouts.app.failedAlert')
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Formulir Tambah Penyelenggara Baru</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('penyelenggara.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row mb-4">
            <label for="nama_penyelenggara" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
              Penyelenggara</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="nama_penyelenggara" name="nama_penyelenggara" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
            <div class="col-sm-12 col-md-7">
              <input type="email" class="form-control" id="email_penyelenggara" name="email_penyelenggara" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
            <div class="col-sm-12 col-md-7">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="alamat_kantor" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat
              Kantor</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="kontak" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kontak</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="lisensi" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lisensi</label>
            <div class="col-sm-12 col-md-7">
              <input type="file" class="form-control" id="lisensi" name="lisensi" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label for="username" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
@endsection