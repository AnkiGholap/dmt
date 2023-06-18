<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item {{ request()->is('home') == 'home' ? 'menu-open' : null }}">
        <a href="{{ url('/home') }}"
            class="nav-link {{ request()->is('home') == 'home' ? 'active' : null }}">
            <p>
                Dashboard
                {{-- <span class="badge badge-info right">2</span> --}}
            </p>
        </a>
    </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/home')}}" class="nav-link">Upload</a>
      </li>
     
      <li class="nav-item {{ request()->is('masterdata') == 'masterdata' ? 'menu-open' : null }}">
        <a href="{{ url('/masterdata') }}"
            class="nav-link {{ request()->is('masterdata') == 'masterdata' ? 'active' : null }}">
            <p>
                Master Data
                {{-- <span class="badge badge-info right">2</span> --}}
            </p>
        </a>
    </li>
   
    @can('setting-viewAny')
    <li class="nav-item">
        <a href="{{ url('settings') }}"
            class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
           <p>General Setting {{-- <span class="badge badge-info right">2</span> --}}</p>
        </a>
    </li>
    @endcan
      
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      
      

       <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">
          Logout
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
   
  </nav>