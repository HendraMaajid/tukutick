@extends('layouts.app')

@section('title', 'Update Kategori')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Ubah Kategori</h1>
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
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Formulir Ubah Kategori</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('kategori.update', $kategori->id_kategori) }}}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group row mb-4">
            <label for="nama_kategori" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
              Kategori</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" @error('nama_kategori') is-invalid @enderror" name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
              @error('nama_kategori')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
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