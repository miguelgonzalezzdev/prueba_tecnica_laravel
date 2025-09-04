@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="">Prueba Técnica</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="">Prueba</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Hak Akses</li>
            <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak Akses</span></a>
            </li>
            @endif
            <!-- profile ganti password -->
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Ganti Password</span></a>
            </li>
            <li class="menu-header">Base de datos</li>
            <li class="{{ Request::is('provincias') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('provincias') }}"><i class="fas fa-city"></i><span>Provincias</span></a>
            </li>
            <li class="{{ Request::is('clientes') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('clientes') }}"><i class="fas fa-users"></i><span>Clientes</span></a>
            </li>
             <li class="{{ Request::is('presupuestos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('presupuestos') }}"><i class="fas fa-file-invoice"></i><span>Presupuestos</span></a>
            </li>
        </ul>
    </aside>
</div>
@endauth
