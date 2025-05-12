<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{ url('assetsfe/images/img_logo.png') }}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="assetsfe/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="assetsfe/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="assetsfe/css/tiny-slider.css" />
    <link rel="stylesheet" href="assetsfe/css/aos.css" />
    <link rel="stylesheet" href="assetsfe/css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        .active-custom {
            color: rgb(47, 186, 79) !important;
            font-weight: bold;
        }

        .pagination-modern .page-link {
            color: #555;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 0 2px;
            transition: all 0.3s ease;
        }

        .pagination-modern .page-link:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination-modern .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            font-weight: 500;
        }

        .pagination-modern .page-link.rounded-start {
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .pagination-modern .page-link.rounded-end {
            border-radius: 0 0.375rem 0.375rem 0;
        }

        .pagination-modern .page-item.disabled .page-link {
            color: #ccc;
            background-color: #f8f9fa;
            border-color: #ddd;
            cursor: not-allowed;
        }

        .pagination-modern {
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        }
    </style>
    <title>

        {{ $title }}
    </title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Navbar -->
    @include('homepage.navbar')
    <!-- End Navbar -->

    <div>
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('homepage.footer')
    <!-- END FOOTER -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="assetsfe/js/bootstrap.bundle.min.js"></script>
    <script src="assetsfe/js/tiny-slider.js"></script>
    <script src="assetsfe/js/aos.js"></script>
    <script src="assetsfe/js/navbar.js"></script>
    <script src="assetsfe/js/counter.js"></script>
    <script src="assetsfe/js/custom.js"></script>
    @stack('script')
</body>

</html>