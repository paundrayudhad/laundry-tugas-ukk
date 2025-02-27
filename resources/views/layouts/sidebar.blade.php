<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">LL</a>
        </div>
        <ul class="sidebar-menu">
            @if (Auth::user()->role == 'admin')
            <li class="menu-header">Menu Admin</li>
            <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('cabang.index')}}">Kelola Cabang</a></li>
                    <li><a class="nav-link" href="{{route('layanan.index')}}">Kelola Layanan</a></li>
                    <li><a class="nav-link" href="{{route('users.index')}}">Kelola User</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{route('laporan.index')}}"><i class="fas fa-book"></i> <span>Laporan</span></a></li>
            @endif
            <li class="menu-header">Menu User</li>
            <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('transaksi.create')}}">Buat Transaksi</a></li>
                    <li><a class="nav-link" href="{{route('transaksi.index')}}">Riwayat Transaksi</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
