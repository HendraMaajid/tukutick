<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  @include('layouts.app2.style')
</head>

<body>
  <div class="w-full row" style="overflow:hidden;height:100vh;width:100%">
    <div class="col-8 p-0">
      <img src=" {{asset('assets/img/img_tukutick/sign-img.svg')}}" class="img-fluid">
    </div>
    <div class="col-4 p-3 mt-2">
      <a href="#" class="navbar-brand d-flex align-items-center mb-0  text-decoration-none fs-1">
        TukuTick
      </a>
      @yield('content')
    </div>
    @include('layouts.app2.script')
</body>

</html>