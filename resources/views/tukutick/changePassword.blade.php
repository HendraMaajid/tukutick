<!-- resources/views/auth/change-password.blade.php -->
@extends('layouts.signApp2')

@section('title', 'Change Password')

@section('content')
<p class="fw-bold fs-5 ps-2 mt-2">{{ __('Change Password') }}</p>
<div class="ps-2 w-full">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="col-form-label">{{ __('Current Password') }}</label>
            <div class="col-11">
                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autofocus>
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="new_password" class="col-form-label">{{ __('New Password') }}</label>
            <div class="col-11">
                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="col-form-label">{{ __('Confirm New Password') }}</label>
            <div class="col-11">
                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
            </div>
        </div>

        <div class="mb-4">
            <div class="col-12">
                <button type="submit" class="col-11 btn btn-primary fw-bold">
                    {{ __('Change Password') }}
                </button>
            </div>
        </div>
        <a href="{{ session('url.intended') }}" class="text-decoration-none pt-3">
            &nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>back&nbsp;
        </a>
    </form>
</div>
@endsection
