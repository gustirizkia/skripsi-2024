<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="">
                <img src="{{ asset('gambar/logo_white.png') }}" width="110" height="32" alt="LAWTECH"
                    class="navbar-brand-image">
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">


                <li class="nav-item {{ request()->is('admin') ? 'active' : '' }} mt-3">
                    <a class="nav-link" href="/admin">

                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/kategori*') ? 'active' : '' }} mt-3">
                    <a class="nav-link" href="{{ route('admin.kategori.index') }}">

                        <span class="nav-link-title">
                            Kategori Hukum
                        </span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('admin/lawyer*') ? 'active' : '' }} mt-3">
                    <a class="nav-link" href="{{ route('admin.lawyer.index') }}">

                        <span class="nav-link-title">
                            Pengacara
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/transaksi*') ? 'active' : '' }} mt-3">
                    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">

                        <span class="nav-link-title">
                            Transaksi
                        </span>
                    </a>
                </li>


                <li class="nav-item mt-auto mb-2">
                    <a class="nav-link" href="">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2">
                                </path>
                                <path d="M15 12h-12l3 -3"></path>
                                <path d="M6 15l-3 -3"></path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Logout
                        </span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</aside>
