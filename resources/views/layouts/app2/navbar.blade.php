
@php
  $user = Auth::user();
@endphp
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <div class="d-flex">
      <a class="navbar-brand fs-2 ms-2" href="{{ Auth::guest() ? url('/') : route('home.index')}}">TukuTick</a>
    </div>
    <div class="d-flex gap-5">
      <div class="navbar-nav d-flex flex-row gap-4 my-auto">
        @guest
      <a class="nav-link" href="#home">Home</a>
      <a class="nav-link" href="#about">About</a>
      <a class="nav-link" href="#event">Event</a>
      <a class="nav-link" href="#footer">Contact</a>
    @else
    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
    <a class="nav-link" href="{{ route('home.index') }}#about">About</a>
    <a class="nav-link" href="{{ route('home.index') }}#event">Event</a>
    <a class="nav-link" href="#footer">Contact</a>
    <a class="nav-link" href="{{ route('tiket.index', ['id' => $id_customer]) }}">My Ticket</a>
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
    <div class="navbar-nav d-flex flex-row gap-4 pt-1" style="margin-left: -20px">
      <!-- notification -->
      <div class="dropdown">
        <div class="notification-bell-container">
          <i class="fa-solid fa-bell fs-2" id="bellIcon"></i>
          @if ($notifikasi->count() > 0)
            <span class="notification-badge">{{ $notifikasi->count() }}</span>
          @endif
        </div>
        <div class="dropdown-content" id="dropdownContent">
          <div class="notification-header">Notifications</div>
          <div class="notification-content">
          <div class="notification-item">
            @forelse ($notifikasi as $notif)
          <a href="{{ route('transaksi.show', ['transaksi' => $notif->id_pemenang]) }}"
          class="text-decoration-none text-dark">
          <p class="fw-bold">[Sistem]</p>
          <div>
          <p>Selamat anda berhasil memenangkan tiket {{ $notif->event->nama_event }}</p>
          <span>{{ $notif->created_at->diffForHumans() }}</span>
          </div>
          </a>
          <!-- Tambahkan elemen tanda merah di sini jika ada notifikasi -->
          @if (!$loop->last)
        <hr> <!-- Tambahkan garis pemisah jika bukan notifikasi terakhir -->
      @endif
        @empty
        <p class="text-center">No message</p>
      @endforelse
          </div>
          </div>
        </div>
      </div>
      <!-- notif end -->
      <div class="dropdown">
        <a href="#" class="dropdown-toggle text-decoration-none link-body-emphasis" data-bs-toggle="dropdown" aria-expanded="false">
          @if ($user && $user->profile_picture)
            <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture"
            width="32" height="32" class="rounded-circle">
          @else
            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="mdo" width="32" height="32" class="rounded-circle">
          @endif
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('password.change') }}">Change Password</a></li>
          <li><a class="dropdown-item" href="{{route('profil.edit', ['profil' => $id_customer])}}">Profile</a></li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
  const bellIcon = document.getElementById('bellIcon');
  const dropdownContent = document.getElementById('dropdownContent');
  const bellContainer = bellIcon.closest('.notification-bell-container');

  // Toggle dropdown visibility when bell container is clicked
  bellContainer.addEventListener('click', (event) => {
    event.stopPropagation();
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
  });

  // Close the dropdown when clicking outside of it
  document.addEventListener('click', (event) => {
    if (!bellContainer.contains(event.target) && !dropdownContent.contains(event.target)) {
      dropdownContent.style.display = 'none';
    }
  });
});
</script>