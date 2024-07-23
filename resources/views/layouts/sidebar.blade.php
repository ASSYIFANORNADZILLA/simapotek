<div class="d-flex flex-column bg-info p-3" style="width: 250px; height: 100vh;">
    <!-- Logo -->
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
    </div>

    <!-- Navigation Links -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white  {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pegawai') }}" class="nav-link text-white {{ request()->routeIs('pegawai') ? 'active' : '' }}">
                {{ __('Data Pegawai') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('obat') }}" class="nav-link text-white {{ request()->routeIs('obat') ? 'active' : '' }}">
                {{ __('Data Obat') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pemasok') }}" class="nav-link text-white {{ request()->routeIs('pemasok') ? 'active' : '' }}">
                {{ __('Data Pemasok') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link text-white {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                {{ __('Data Kategori') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penjualan.index') }}" class="nav-link text-white {{ request()->routeIs('penjualan.index') ? 'active' : '' }}">
                {{ __('Penjualan') }}
            </a>
        </li>
    </ul>

    <!-- Logout Button -->
    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>
