<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('index3.html') }}" class="brand-link">
        <img src="{{ asset('/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GOshier</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display: flex; align-items: center;">
            <div class="image">
                <img src="{{ asset('/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if (Auth::guard('web')->check())
            <div class="info" style="margin-left: 20px;">
                <a href="#" class="d-block">{{ auth()->user()->name}}</a>
                <a href="#" class="d-block">{{ auth()->user()->email}}</a>
            </div>
            @elseif(Auth::guard('admin')->check())
            <div class="info" style="margin-left: 20px;">
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name}}</a>
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->email}}</a>
            </div>
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                @admin
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index')}}" class="nav-link">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Cashiers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index')}}" class="nav-link">
                                <i class="fa fa-box nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endadmin
                <li class="nav-item">
                    <a href="{{ route('cashierpages')}}" class="nav-link">
                        <i class="fa fa-boxes nav-icon"></i>
                        <p>Cashiers</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
