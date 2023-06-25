<style>
  .btn-primary{
    background-color: #343a40 !important;
    border:#343a40 !important; 
  }
</style>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
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
      </li>

      @can('setting-viewAny')
        <li class="nav-item">
            <a href="{{ url('settings') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
              <p>General Setting {{-- <span class="badge badge-info right">2</span> --}}</p>
            </a>
        </li>
      @endcan
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">
          <span>Logout</span> 
        </a>
      </li>
    </ul>
  </nav>
  @if(request()->is('upload') || request()->is('skus*') || request()->is('mastersku*') || request()->is('categories*') || request()->is('suppliers*') || request()->is('actualStockImport*')|| request()->is('salesdataImport*')|| request()->is('skuForeCastT1Import*'))
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="navbar-nav">
        <li><a href="{{url('skus') }}" class="nav-link {{ request()->is('skus*') ? 'active' : '' }} ">Add Sku</a></li>
        <li><a href="{{url('mastersku')}}"   class="nav-link {{ request()->is('mastersku*') ? 'active' : '' }} ">Add Master Sku</a></li>
        <li><a href="{{url('categories')}}"  class="nav-link {{ request()->is('categories*') ? 'active' : '' }} ">Add Category</a></li>
        <li><a href="{{url('suppliers')}}"   class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }} ">Add Suppliers</a></li>
        <li><a href="{{url('actualStockImport')}}" class="nav-link {{ request()->is('actualStockImport*') ? 'active' : '' }} ">Add Actual Stock</a></li>
        <li><a href="{{url('salesdataImport')}}"   class="nav-link {{ request()->is('salesdataImport*') ? 'active' : '' }} ">Add Actual Sales</a></li>
        <li><a href="{{url('skuForeCastT1Import')}}" class="nav-link {{ request()->is('skuForeCastT1Import*') ? 'active' : '' }} ">Add Forcast</a></li>
      </ul>
    </nav>
  @endif  
  