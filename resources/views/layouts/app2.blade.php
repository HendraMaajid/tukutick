<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <title>@yield("title")</title>
  @include('layouts.app2.style')
  @yield('style')

</head>

<body>
  @include('layouts.app2.navbar')

  @yield('content')

  @include('layouts.app2.footer')

  @include('layouts.app2.script')

  @yield('script')

</body>

</html>