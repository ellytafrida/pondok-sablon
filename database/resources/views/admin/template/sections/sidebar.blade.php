<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('logo.png') }}" height="30">
                <span>
                    PONDOK SABLON
                </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/') }}" class="waves-effect">
                        <i class="mdi mdi-home-analytics"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li class="menu-title">Master Data</li>

                <li>
                    <a href="{{ url('orders') }}" class=" waves-effect">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Data Pesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('services') }}" class=" waves-effect">
                        <i class="fab fa-servicestack"></i>
                        <span>Data Layanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('blogs') }}" class=" waves-effect">
                        <i class="feather feather-file-text"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('testimonies') }}" class=" waves-effect">
                        <i class="mdi mdi-comment-account"></i>
                        <span>Data Testimoni</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('users') }}" class=" waves-effect">
                        <i class="feather feather-users"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>

                @if (Auth::user()->level == 'super-admin')
                    <li>
                        <a href="{{ url('administrators') }}" class=" waves-effect">
                            <i class="fa fa-user-tie"></i>
                            <span>Data Administrator</span>
                        </a>
                    </li>
                @endif

                <li class="menu-title">Lainnya</li>


                <li>
                    <a href="{{ url('service-categories') }}" class=" waves-effect">
                        <i class="mdi mdi-book-variant"></i>
                        <span>Kategori Layanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('blog-categories') }}" class=" waves-effect">
                        <i class="mdi mdi-equal-box"></i>
                        <span>Kategori Blog</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('information') }}" class=" waves-effect">
                        <i class="mdi mdi-office-building"></i>
                        <span>Informasi</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
