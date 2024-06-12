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
              <a href=" @if(Auth::user()->role == 'admin')
         {{ url('admin') }}
      @elseif(Auth::user()->role == 'penyelenggara')
     {{ route('EO.index') }}
  @endif
                        ">
                <i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            @if(Auth::user()->role == 'admin')
            <!-- <li>
          <a href="{{url('users')}}"><i class="fas fa-user"></i><span>Users</span></a>
        </li> -->
            <li>
              <a href="{{url('kategori')}}"><i class="fas fa-list"></i><span>Categories</span></a>
            </li>
            <li>
              <a href="{{url('profil')}}"><i class="fas fa-users"></i><span>Customers</span></a>
            </li>
            <li>
              <a href="{{url('penyelenggara')}}"><i class="fas fa-user-tie"></i><span>Organizer</span></a>
            </li>
            @elseif(Auth::user()->role == 'penyelenggara')
            <li>
              <a href="{{route('event.index')}}"><i class="fas fa-calendar-alt"></i><span>Events</span></a>
            </li>
            <li>
              <a href="{{route('preorder.index')}}"><i class="fas fa-shopping-basket"></i><span>Pre-Orders</span></a>
            </li>
            <li>
              <a href="{{route('transaksi.index')}}"><i class="fas fa-dollar-sign"></i><span>Transactions</span></a>
            </li>
            <li>
              <a href="{{route('pemenang.index')}}"><i class="fas fa-ticket-alt"></i><span>Winners</span></a>
            </li>
            <!-- <li>
      <a href="{{url('tiket')}}"><i class="fas fa-ticket-alt"></i><span>Tiket</span></a>
      </li> -->
            @endif
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        </aside>