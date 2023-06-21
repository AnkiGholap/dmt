<style>
  .btn-primary{
    background-color: #343a40 !important;
    border:#343a40 !important; 
  }
</style>
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
        <a href="{{url('/upload')}}" class="nav-link">Upload</a>
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
<br><br>
<div class="nav2">
<nav class="navbar2">
  <ul>
    <li><a href="javascript:void(0);" data-url="/skus/create" class="nav-link secondarymenu">Add Sku</a></li>
    <li><a href="javascript:void(0);" data-url="/mastersku/create" class="nav-link secondarymenu">Add Master Sku</a></li>
    <li><a href="javascript:void(0);" data-url="/categories/create" class="nav-link secondarymenu">Add Category</a></li>
    <li><a href="javascript:void(0);" data-url="/suppliers/create" class="nav-link secondarymenu">Add Suppliers</a></li>
    <li><a href="javascript:void(0);" data-url="/actualStockImport" class="nav-link secondarymenu">Add Actual Stock</a></li>
    <li><a href="javascript:void(0);" data-url="/salesdataImport" class="nav-link secondarymenu">Add Actual Sales</a></li>
    <li><a href="javascript:void(0);" data-url="/skuForeCastT1Import" class="nav-link secondarymenu">Add Forcast</a></li>
  </ul>
</nav>  
</div>
  