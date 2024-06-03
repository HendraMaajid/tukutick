@extends('layouts.signApp2')
@section('title', 'Register')
@section('content')
<p class="fw-bold fs-5 ps-2 mt-2">Register</p>
<div class="ps-2 w-full">
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group mb-0">
      <label for="name" class="col-form-label">Name</label>
      <div class="col-11">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
          value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-0">
      <label for="username" class="col-form-label">Username</label>
      <div class="col-11">
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
          value="{{ old('username') }}" required autocomplete="username">
        @error('username')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-0">
      <label for="tgl_lahir" class="col-form-label">Tanggal Lahir</label>

      <div class="col-11">
        <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
          value="{{ old('tgl_lahir') }}" required>
        @error('tgl_lahir')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror

      </div>
    </div>

    <div class="row mb-0">
      <label for="no_hp_customer" class="col-form-label">Nomor Hp</label>

      <div class="col-11">
        <input id="no_hp_customer" type="text" class="form-control @error('no_hp_customer') is-invalid @enderror"
          name="no_hp_customer" value="{{ old('no_hp_customer') }}" required>
        @error('no_hp_customer')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <!-- <div class="row mb-0">
      <label for="alamat_customer" class="col-form-label">Alamat</label>

      <div class="col-11">
        <input id="alamat_customer" type="text" class="form-control @error('alamat_customer') is-invalid @enderror"
          name="alamat_customer" value="{{ old('alamat_customer') }}" required>
        @error('alamat_customer')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div> -->

    <!-- Hidden Role Field -->
    <input id="role" type="hidden" name="role" value="customer">

    <div class="row mb-0">
      <label for="email" class="col-form-label">Email</label>

      <div class="col-11">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
          value="{{ old('email') }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-0">
      <label for="password" class="col-form-label">Password</label>

      <div class="col-11">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
          name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-0">
      <label for="confirm_password" class="col-form-label">Confirm Password</label>

      <div class="col-11">
        <input id="confirm_password" type="password" class="form-control" name="password_confirmation" required
          autocomplete="new-password">
      </div>
    </div>


    <div class="row mt-4">

      <div class="col-12">
        <button type="submit" class="col-11 btn btn-primary fw-bold">
          {{ __('Register') }}
        </button>
        <p class="col-11 d-flex justify-content-center">Do you have an account?<a href="{{ route('login') }}"
            class="text-decoration-none">&nbsp;Login&nbsp;</a>
          now</p>
      </div>
    </div>
  </form>
</div>
@endsection