  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <div class="d-flex">
        <a class="navbar-brand fs-2 ms-2" href="{{ Auth::guest() ? url('/') : route('home.index')}}">TukuTick</a>
      </div>
      <div class="d-flex gap-5">
        <div class="navbar-nav d-flex flex-row gap-4">
          @guest
        <a class="nav-link" href="#home">Home</a>
        <a class="nav-link" href="#about">About</a>
        <a class="nav-link" href="#event">Event</a>
        <a class="nav-link" href="#contact">Contact</a>
      @else
      <a class="nav-link" href="#home">Home</a>
      <a class="nav-link" href="#about">About</a>
      <a class="nav-link" href="#event">Event</a>
      <a class="nav-link" href="#contact">Contact</a>
      <a class="nav-link" href="#myTicket">My Ticket</a>
    @endguest
        </div>
        <div class="d-flex gap-3">
          @guest
        @if (Route::has('login'))
      <a class="btn btn-outline-dark btn-custom-width rounded-pill" href="{{ route('login') }}">Login</a>
    @endif
        @if (Route::has('register'))
      <a class="btn btn-outline-primary btn-custom-width rounded-pill" href="{{ route('register') }}">Sign Up</a>
    @endif
      @else
        <div class="navbar-nav d-flex flex-row gap-4 pt-1">
        <a href="#" class="text-dark"><i class="fa-solid fa-bell fs-2 "></i></a>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
          data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" style="">
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
            {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
          </li>
          </ul>
        </div>
        </div>
    @endguest
          <div class="dropdown-divider"></div>
        </div>
      </div>
    </div>
    </div>
  </nav>