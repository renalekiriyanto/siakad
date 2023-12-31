<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }} App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->profile->photo) ?? asset('storage/' . Auth::user()->profile->photo) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item menu">
                        <a href="{{ route('kelas') }}" class="nav-link">
                            <i class="nav-icon fas fa-door-open"></i>
                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Mata Pelajaran
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('mapel') }}" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Mata Pelajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('jadwalmapel') }}" class="nav-link">
                                    <i class="fas fa-calendar nav-icon"></i>
                                    <p>Jadwal</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @canany(['list user', 'tambah user', 'edit user', 'delete user', 'assign permission'])
                        <li class="nav-item menu">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Manajemen User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user') }}"
                                        class="nav-link @if (\Request::route()->getName() == 'user') active @endif">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permission_user') }}" class="nav-link">
                                        <i class="fas fa-user-cog nav-icon"></i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcanany


                    <li class="nav-item menu">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-universal-access"></i>
                            <p>
                                Manajemen Permission
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('permission') }}" class="nav-link">
                                    <i class="fas fa-layer-group nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-block btn-danger text-white"><i
                    class="nav-icon fa-right-from-bracket"></i>Logout</button>
        </form>
    </div>
    <!-- /.sidebar -->
</aside>
