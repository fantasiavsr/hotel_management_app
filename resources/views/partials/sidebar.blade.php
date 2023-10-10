<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="background-color: #FAFAFA; z-index: 2; border-right: 2px solid #F0F0F0;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon pt-3">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img class="img" src="" alt="" style="width: 83%">
            Brand
        </div>
        {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}"
            @if ($title === 'Dashboard') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Ruangan -->
    <li class="nav-item {{ request()->is('ruangan') ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('ruangan') }}"
            @if ($title === 'Ruangan') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;"" @endif>
            <i class="fa-solid fa-bed"></i>
            <span>Ruangan</span>
        </a>
    </li>

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item {{ request()->is('portofolio') ? 'active' : '' }}">
        <a class="nav-link " href=""
            @if ($title === 'Portofolio') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>
            <i class="fa-solid fa-user-astronaut"></i>
            <span>Pelanggan</span>
        </a>
    </li>


    <!-- Nav Item - Booking -->
    <li class="nav-item {{ request()->is('portofolio') ? 'active' : '' }}">
        <a class="nav-link " href=""
            @if ($title === 'Portofolio') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>
            <i class="fa-solid fa-inbox"></i>
            <span>Booking</span>
        </a>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item {{ request()->is('portofolio') ? 'active' : '' }}">
        <a class="nav-link " href=""
            @if ($title === 'Portofolio') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Transaksi</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Utilites -->
    <div class="sidebar-heading">
        Utilites
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item {{ request()->is('transaksi*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-book"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities"
            class="collapse {{ request()->is('transaksi*') ? 'show' : '' }} {{ request()->is('item*') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item {{ $title === 'Transaksi | Green Bond' ? 'active' : '' }}" href=""
                    @if ($title === 'Transaksi | Green Bond') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>Ruangan</a>
                <a class="collapse-item {{ $title === 'Transaksi | Green Sukuk' ? 'active' : '' }}" href=""
                    @if ($title === 'Transaksi | Green Sukuk') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>Pelanggan</a>
                <a class="collapse-item {{ $title === 'Transaksi | Green Taxonomy' ? 'active' : '' }}" href=""
                    @if ($title === 'Transaksi | Green Taxonomy') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>Booking</a>
                <a class="collapse-item {{ $title === 'Transaksi | List Transaksi' ? 'active' : '' }}" href=""
                    @if ($title === 'Transaksi | List Transaksi') style="color: #3974FE; background-color:#F0F0F0;  border-right: 8px solid #3974FE;" @endif>
                    Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pengaturan -->
    <li class="nav-item {{ request()->is('bank') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div> --}}

</ul>
