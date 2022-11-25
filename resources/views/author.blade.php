<?php $activePage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" href="{{ URL::asset('images/favicon/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{url('/')}}" class="logo d-flex align-items-center">
                <img src="{{ URL::asset('images/yiflogodark.png') }}" alt="logo">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::asset('images/author/'.$user_meta->avatar) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ URL::asset('user_logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                @if(request()->is('yn-author'))
                <a class="nav-link" href="{{url('yn-author')}}">
                @else
                <a class="nav-link collapsed" href="{{url('yn-author')}}">
                @endif
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                @if(str_contains(url()->current(), '/yn-author/articles'))
                <a class="nav-link" data-bs-target="#articles-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                @else
                <a class="nav-link collapsed" data-bs-target="#articles-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                @endif
                    <i class="bi bi-journal-text"></i>
                    <span>Articles</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="articles-nav" class="nav-content collapse <?=(str_contains(url()->current(), '/yn-author/articles')) ? 'show':'';?>" data-bs-parent="#sidebar-nav" style="">
                    <li>
                        <a href="{{url('yn-author/articles')}}" class="<?=(request()->is('yn-author/articles')) ? 'active' : '';?>">
                            <i class="bi bi-circle"></i><span>All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('yn-author/articles/create')}}" class="<?=(request()->is('yn-author/articles/create')) ? 'active' : '';?>">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Article Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->

    <!-- Main Content Wrapper -->
    @yield('content')
    <!-- End Main Content Wrapper -->
    
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="credits">
            Designed by <a href="kwad.in">KWAD</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"
        integrity="sha256-mBCu5+bVfYzOqpYyK4jm30ZxAZRomuErKEFJFIyrwvM=" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::asset('js/admin.js') }}"></script>
</body>

</html>