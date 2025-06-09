   <nav class="navbar navbar-expand-lg main-navbar">
     <form class="form-inline mr-auto">
       <ul class="navbar-nav mr-3">
         <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
         <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
         </li>
       </ul>

     </form>
     <ul class="navbar-nav navbar-right">
       <li class="dropdown"><a href="#" data-toggle="dropdown"
           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
           <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
           <div class="d-sm-none d-lg-inline-block">{{Auth::user()->username;}}</div>
         </a>
         <div class="dropdown-menu dropdown-menu-right">
           <a href="{{ route('password.change') }}" class="dropdown-item has-icon">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="15" height="15" class="mr-1"> <path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM11 15.7324V18H13V15.7324C13.5978 15.3866 14 14.7403 14 14C14 12.8954 13.1046 12 12 12C10.8954 12 10 12.8954 10 14C10 14.7403 10.4022 15.3866 11 15.7324ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16Z"></path></svg>
            Change Password
           </a>
           <div class="dropdown-divider"></div>
           <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <i class="fas fa-sign-out-alt"></i> Logout
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
           </form>


         </div>
       </li>
     </ul>
   </nav>