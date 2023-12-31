<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Selamat Datang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Xcl</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard Xclude</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">Penjualan</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('user.index') }}">List User</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('product.index') }}">Master Product</a>
                    </li>

                </ul>
            </li>


        </ul>


    </aside>
</div>
