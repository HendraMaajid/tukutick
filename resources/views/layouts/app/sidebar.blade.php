        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('/')}}">TukuTick</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/')}}">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="{{url('admin')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            @if(Auth::user()->role == 'admin')
            <li>
              <a href="{{url('akun')}}"><i class="fas fa-user"></i><span>Users</span></a>
            </li>
            <li>
              <a href="{{url('kategori')}}"><i class="fas fa-list"></i><span>Kategori</span></a>
            </li>
            <li>
              <a href="{{url('penyelenggara')}}"><i class="fas fa-user-tie"></i><span>Penyelenggara</span></a>
            </li>
            <li>
              <a href="{{url('customer')}}"><i class="fas fa-users"></i><span>Customer</span></a>
            </li>
            @elseif(Auth::user()->role == 'penyelenggara')
            <li>
              <a href="{{url('event')}}"><i class="fas fa-calendar-alt"></i><span>Event</span></a>
            </li>
            <li>
              <a href="{{url('transaksi')}}"><i class="fas fa-dollar-sign"></i><span>Transaksi</span></a>
            </li>
            <!-- <li>
      <a href="{{url('preorder')}}"><i class="fas fa-shopping-basket"></i><span>Pre Order</span></a>
    </li>
    <li>
      <a href="{{url('pemenang')}}"><i class="fas fa-ticket-alt"></i><span>Pemenang</span></a>
    </li> -->
            <li>
              <a href="{{url('tiket')}}"><i class="fas fa-ticket-alt"></i><span>Tiket</span></a>
            </li>
            @endif
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        </aside>