<style>
  .btn-primary{
    background-color: #343a40 !important;
    border:#343a40 !important; 
  }
</style>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav mr-auto">
      
        <img src="{{ asset(get_from_setting('logo')) }}" alt="{{ get_from_setting('app_name') }}"
        class="brand-image img-circle elevation-3" style="opacity: .8;margin-left: 20%;
        width: 30%;">
    </ul>
    <ul class="navbar-nav mx-auto">
      <li class="nav-item {{ request()->is('home') == 'home' ? 'menu-open' : null }}">
        <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : null }}">
            <p>
                Dashboard
                {{-- <span class="badge badge-info right">2</span> --}}
            </p>
        </a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/upload')}}" class="nav-link {{ request()->is('upload') || request()->is('skus*') || request()->is('mastersku*') || request()->is('categories*') || request()->is('suppliers*') || request()->is('actualStockImport*')|| request()->is('salesdataImport*')|| request()->is('skuForeCastT1Import*') ? 'active' : null }}">Upload</a>
      </li>

      <li class="nav-item">
        <a href="{{ url('/masterdata') }}" class="nav-link {{ request()->is('masterdata') ? 'active' : null }}">
            <p>
                Master Data
            </p>
        </a>
<<<<<<< HEAD
    </li>
   
    @can('setting-viewAny')
    <li class="nav-item">
        <a href="{{ url('settingnew') }}"
            class="nav-link">
           <p>General Setting {{-- <span class="badge badge-info right">2</span> --}}</p>
        </a>
    </li>
    @endcan
      
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      
      
=======
      </li>
>>>>>>> 9e66bd1f43d3e11f34b42e65483f55c155011325

      @can('setting-viewAny')
        <li class="nav-item">
            <a href="{{ url('general-setting') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
              <p> Settings</p>
            </a>
        </li>
      @endcan
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">Hi {{ auth()->user()->name }}
        <a class="nav-link" href="{{url('logout')}}">
          <span>Logout</span> 
        </a>
      </li>
    </ul>
  </nav>
<<<<<<< HEAD
<br><br>
@if(Request::segment(1) == 'upload')
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
@elseif(Request::segment(1) == 'settingnew')
<div class="nav2">
  <nav class="navbar2">
    <ul>
      <li><a href="javascript:void(0);" data-url="/users/{{@Auth::user()->id}}/edit/" class="nav-link secondarymenu">User Profile</a></li>
      <li><a href="javascript:void(0);" data-url="/users" class="nav-link secondarymenu">Users</a></li>
      <li><a href="javascript:void(0);" data-url="/roles" class="nav-link secondarymenu">Roles</a></li>
      <li><a href="javascript:void(0);" data-url="/settings" class="nav-link secondarymenu">General Settings</a></li>
     
    </ul>
  </nav>
@endif
</div>
=======
  @if(request()->is('upload') || request()->is('skus*') || request()->is('mastersku*') || request()->is('categories*') || request()->is('suppliers*') || request()->is('actualStockImport*')|| request()->is('salesdataImport*')|| request()->is('skuForeCastT1Import*'))
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav mx-auto">
        @can('sku-viewAny')
            <li><a href="{{url('skus') }}" class="nav-link {{ request()->is('skus*') ? 'active' : '' }} ">Add Sku</a></li>
        @endcan
        @can('mastersku-viewAny')
            <li><a href="{{url('mastersku')}}"   class="nav-link {{ request()->is('mastersku*') ? 'active' : '' }} ">Add Master Sku</a></li>
        @endcan    
        @can('category-viewAny')
            <li><a href="{{url('categories')}}"  class="nav-link {{ request()->is('categories*') ? 'active' : '' }} ">Add Category</a></li>
        @endcan    
        @can('supplier-viewAny')
            <li><a href="{{url('suppliers')}}"   class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }} ">Add Suppliers</a></li>
        @endcan    
        @can('actualstock-viewAny')
            <li><a href="{{url('actualStockImport')}}" class="nav-link {{ request()->is('actualStockImport*') ? 'active' : '' }} ">Add Actual Stock</a></li>
        @endcan    
        @can('salesdata-viewAny')
            <li><a href="{{url('salesdataImport')}}"   class="nav-link {{ request()->is('salesdataImport*') ? 'active' : '' }} ">Add Actual Sales</a></li>
        @endcan 
        @can('skuforecastt1-viewAny')
            <li><a href="{{url('skuForeCastT1Import')}}" class="nav-link {{ request()->is('skuForeCastT1Import*') ? 'active' : '' }} ">Add Forcast</a></li>
        @endcan
      </ul>
    </nav>
  @endif  

  @if(request()->is('general-setting') || request()->is('settings') || request()->is('users*') || request()->is('roles*') || request()->is('permissions*'))
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav mx-auto">
        @can('user-viewAny')
            <li><a href="{{url('users')}}"   class="nav-link {{ request()->is('users*') ? 'active' : '' }} ">Users</a></li>
        @endcan
        @can('setting-viewAny')
           <li><a href="{{url('settings') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }} ">General Setting</a></li>
        @endcan       
        @can('role-viewAny')
            <li><a href="{{url('roles')}}"  class="nav-link {{ request()->is('roles*') ? 'active' : '' }} ">Roles</a></li>
        @endcan
        @can('permission-viewAny')    
            <li><a href="{{url('permissions')}}"   class="nav-link {{ request()->is('permissions*') ? 'active' : '' }} ">Permissions</a></li>
        @endcan    
      </ul>
    </nav>
  @endif  
>>>>>>> 9e66bd1f43d3e11f34b42e65483f55c155011325
  