<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ asset(get_from_setting('logo')) }}" alt="{{ get_from_setting('app_name') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ get_from_setting('app_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(get_from_setting('user_logo')) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" #" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item {{ request()->is('home') == 'home' ? 'menu-open' : null }}">
                    <a href="{{ url('/home') }}"
                        class="nav-link {{ request()->is('home') == 'home' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>
              
                {{-- <li class="nav-header">Master Section</li>
                <li
                    class="nav-item {{ request()->is('categories*') || request()->is('suppliers*') || request()->is('tags*') || request()->is('mastersku*')  ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('categories*') || request()->is('suppliers*') || request()->is('tags*') || request()->is('mastersku*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Masters
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">                     
                        @can('category-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('categories') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Categories {{-- <span class="badge badge-info right">2</span> }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('supplier-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('suppliers') }}" class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Suppliers {{-- <span class="badge badge-info right">2</span> }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    
                    <ul class="nav nav-treeview">                     
                        @can('tag-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('tags') }}" class="nav-link {{ request()->is('tags*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Tag {{-- <span class="badge badge-info right">2</span> }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('mastersku-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('mastersku') }}" class="nav-link {{ request()->is('mastersku*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Master Sku {{-- <span class="badge badge-info right">2</span> }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    
                </li>
 --}}

                <li class="nav-header">Menu</li>
                <li class="nav-item {{ request()->is('skus*') || request()->is('salesdataImport*') || request()->is('skuForeCastT1Import*') || request()->is('skuForeCastT2Import*') || request()->is('skuForeCastT3Import*') || request()->is('actualStockImport*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('skus*') || request()->is('salesdataImport*') || request()->is('skuForeCastT1Import*') || request()->is('skuForeCastT2Import*') || request()->is('skuForeCastT3Import*') || request()->is('actualStockImport*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">                     
                        @can('sku-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('skus') }}" class="nav-link {{ request()->is('skus*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Add/Update SKU {{-- <span class="badge badge-info right">2</span> --}}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('salesdata-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('salesdataImport') }}" class="nav-link {{ request()->is('salesdataImport*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Actual Sales</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('actualstock-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('actualStockImport') }}" class="nav-link {{ request()->is('actualStockImport*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Actual Stock</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('skuforecastt1-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('skuForeCastT1Import') }}" class="nav-link {{ request()->is('skuForeCastT1Import*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Forecast</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('mastersku-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('mastersku') }}" class="nav-link {{ request()->is('mastersku*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Master Sku {{-- <span class="badge badge-info right">2</span> --}}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('category-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('categories') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Categories {{-- <span class="badge badge-info right">2</span> --}}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    <ul class="nav nav-treeview">                     
                        @can('supplier-viewAny')
                            <li class="nav-item">
                                <a href="{{ url('suppliers') }}" class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}">
                                    <i class="fas fa-house-user nav-icon"></i>
                                    <p>Suppliers {{-- <span class="badge badge-info right">2</span> --}}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                        <ul class="nav nav-treeview">                     
                           
                                <li class="nav-item">
                                    <a href="{{ url('skuImport') }}" class="nav-link {{ request()->is('skuImport*') ? 'active' : '' }}">
                                        <i class="fas fa-house-user nav-icon"></i>
                                        <p>Sku Import</p>
                                    </a>
                                </li>
                          
                        </ul>
                    
                </li>
                @if(Auth::user()->name == 'Admin')
                <li class="nav-header">System Section</li>
                <li
                    class="nav-item {{ request()->is('settings*') || request()->is('users*') || request()->is('roles*') || request()->is('permissions*') ? 'menu-open' : '' }} ">
                    <a href="#"
                        class="nav-link {{ request()->is('settings*') || request()->is('users*') || request()->is('roles*') || request()->is('permissions*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            System Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        @can('user-viewAny')
                        <li class="nav-item">
                            <a href="{{ url('users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="fas fa-user-cog nav-icon"></i>
                                <p>Users {{-- <span class="badge badge-info right">2</span> --}}</p>
                            </a>
                        </li>
                        @endcan

                        @can('role-viewAny')
                        <li class="nav-item">
                            <a href="{{ url('roles') }}" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Roles {{-- <span class="badge badge-info right">2</span> --}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('permission-viewAny')
                        <li class="nav-item">
                            <a href="{{ url('permissions') }}"
                                class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Permissions {{-- <span class="badge badge-info right">2</span> --}}</p>
                            </a>
                        </li>
                        @endcan

                        @can('setting-viewAny')
                        <li class="nav-item">
                            <a href="{{ url('settings') }}"
                                class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                                <i class="fas fa-sliders-h  nav-icon"></i>
                                <p>General Setting {{-- <span class="badge badge-info right">2</span> --}}</p>
                            </a>
                        </li>
                        @endcan



                    </ul>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a href="" #" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>