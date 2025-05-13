<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap" style="background-color:#fff;">
            <div class="site-navigation">
                <!-- <img src="assetsfe/images/img_logo.png" style="height: 40px; width: auto; object-fit: contain; margin-right: auto;" alt=""> -->
                <a href="index.html" class="logo m-0 float-start text-dark text-decoration-none">Masjid Al Muwahhidiin</a>
                <ul
                    class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li><a class="{{ Route::is('homepage') ? 'active-custom' : '' }} text-dark text-decoration-none" href=" {{ route('homepage') }} ">Home</a>
                    <li><a class=" {{ Route::is('about') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('about') }} ">Tentang</a></li>
                    <li class="has-children">
                        <a class="text-dark text-decoration-none">Profile</a>
                        <ul class="dropdown">
                            <li><a class="{{ Route::is('visimisi') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('visimisi') }} " href="#">Visi Misi</a></li>
                            <li><a class="{{ Route::is('remajamasjid') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('remajamasjid') }} " href="#">Remaja Masjid</a></li>
                        </ul>
                    </li>
                    <li><a class=" {{ Route::is('transaction') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('transaction') }} ">Laporan Keuangan</a></li>
                    <li class="has-children">
                        <a class="text-dark text-decoration-none">Kegiatan</a>
                        <ul class="dropdown">
                            <li><a class=" {{ Route::is('eventjumat') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('eventjumat') }} ">Kegiatan Jumat</a></li>
                            <li><a class=" {{ Route::is('eventmasjid') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('eventmasjid') }} ">Kegiatan Masjid</a></li>
                        </ul>
                    </li>
                    <li><a class="{{ Route::is('sign-in') ? 'active-custom' : '' }} text-dark text-decoration-none" href="{{ route('sign-in') }} ">Login</a></li>
                </ul>

                <a
                    href="#"
                    class="burger dark me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse"
                    data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>