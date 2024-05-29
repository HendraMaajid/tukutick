<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  @include('layouts.app.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.app.navbar')
      <div class="main-sidebar sidebar-style-2">
        @include('layouts.app.sidebar')
      </div>
      <!-- Main Content -->
      @yield('content')
      @include('layouts.app.footer')
    </div>
  </div>
  @include('layouts.app.script')
  @yield('script')
</body>

</html>