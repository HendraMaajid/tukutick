@extends('layouts.signApp2')
@section('title', 'Change Password')

@section('content')
<p class="fw-bold fs-5 ps-2 mt-2">Login</p>
<div class="ps-2 w-full">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group mb-3">
      <label for="email" class="col-form-label">Email</label>
      <div class="col-11">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
          value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="password" class="col-form-label">Password</label>

      <div class="col-11">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
          name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>


    <div class="row mb-0">
      <div class="col-12">
        <button type="submit" class="col-11 btn btn-primary fw-bold">
          {{ __('Login') }}
        </button>
      </div>

    </div>
  </form>
</div>
@endsection