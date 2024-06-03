<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield("title")</title>
  @include('layouts.app2.style')
</head>

<body>
  @include('layouts.app2.navbar')

  @yield('content')

  @include('layouts.app2.footer')
  @yield('script')
  @include('layouts.app2.script')
</body>

</html>