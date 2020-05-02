<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JC - {{ Auth::user()->name }}/id{{ Auth::user()->id }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('style')

</head>

<style>
    .body {
        font-family: 'Open Sans Condensed', sans-serif;
    }

    a {
        text-decoration: none;
    }

    a:hover {

        color: inherit;
    }

    .info-card {
        cursor: pointer;
    }



    .addCard {
        transition: .4s ease;
        cursor: pointer;
    }

    .closeCard {
        position: absolute;
        left: 10%;
        top: 3%;
    }

    .addCard:hover {
        transform: scale(1.1);
    }

    .progress {
        width: 150px;
        height: 150px;
        background: none;
        position: relative;
    }

    .progress::after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 6px solid #eee;
        position: absolute;
        top: 0;
        left: 0;
    }

    .progress>span {
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .progress .progress-left {
        left: 0;
    }

    .progress .progress-bar {
        width: 100%;
        height: 100%;
        background: none;
        border-width: 6px;
        border-style: solid;
        position: absolute;
        top: 0;
    }

    .progress .progress-left .progress-bar {
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }

    .progress .progress-right {
        right: 0;
    }

    .progress .progress-right .progress-bar {
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
    }

    .progress .progress-value {
        position: absolute;
        top: 0;
        left: 0;
    }

    .rounded-lg {
        border-radius: 1rem;
    }

    .text-gray {
        color: #aaa;
    }


    .pricing {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-justify-content: center;
        justify-content: center;
        width: 100%;
        margin: 0 auto 3em;
    }
    .pricing-item {
        position: relative;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-align-items: stretch;
        align-items: stretch;
        text-align: center;
        -webkit-flex: 0 1 330px;
        flex: 0 1 330px;
    }
    .pricing-action {
        color: inherit;
        border: none;
        background: none;
    }
    .pricing-action:focus {
        outline: none;
    }
    .pricing-feature-list {
        text-align: left;
    }
    .pricing-palden .pricing-item {
        font-family: 'Open Sans', sans-serif;
        cursor: default;
        color: #84697c;
        background: #fff;
        box-shadow: 0 0 10px rgba(46, 59, 125, 0.23);
        border-radius: 20px 20px 10px 10px;
        margin: 1em;
    }
    @media screen and (min-width: 66.25em) {
        .pricing-palden .pricing-item {
            margin: 1em -0.5em;
        }
        .pricing-palden .pricing__item--featured {
            margin: 0;
            z-index: 10;
            box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
        }
    }
    .pricing-palden .pricing-deco {
        border-radius: 10px 10px 0 0;
        background: rgba(76, 70, 101, 0.99);
        padding: 4em 0 9em;
        position: relative;
    }
    .pricing-palden .pricing-deco-img {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 160px;
    }
    .pricing-palden .pricing-title {
        font-size: 0.75em;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 5px;
        color: #fff;
    }
    .pricing-palden .deco-layer {
        -webkit-transition: -webkit-transform 0.5s;
        transition: transform 0.5s;
    }
    .pricing-palden .pricing-item:hover .deco-layer--1 {
        -webkit-transform: translate3d(15px, 0, 0);
        transform: translate3d(15px, 0, 0);
    }
    .pricing-palden .pricing-item:hover .deco-layer--2 {
        -webkit-transform: translate3d(-15px, 0, 0);
        transform: translate3d(-15px, 0, 0);
    }
    .pricing-palden .icon {
        font-size: 2.5em;
    }
    .pricing-palden .pricing-price {
        font-size: 5em;
        font-weight: bold;
        padding: 0;
        color: #fff;
        margin: 0 0 0.25em 0;
        line-height: 0.75;
    }
    .pricing-palden .pricing-currency {
        font-size: 0.15em;
        vertical-align: top;
    }
    .pricing-palden .pricing-period {
        font-size: 0.15em;
        padding: 0 0 0 0.5em;
        font-style: italic;
    }
    .pricing-palden .pricing__sentence {
        font-weight: bold;
        margin: 0 0 1em 0;
        padding: 0 0 0.5em;
    }
    .pricing-palden .pricing-feature-list {
        margin: 0;
        padding: 0.25em 0 2.5em;
        list-style: none;
        text-align: center;
    }
    .pricing-palden .pricing-feature {
        padding: 1em 0;
    }
    .pricing-palden .pricing-action {
        font-weight: bold;
        margin: auto 3em 2em 3em;
        padding: 1em 2em;
        color: #fff;
        border-radius: 30px;
        background: #4d4766;
        -webkit-transition: background-color 0.3s;
        transition: background-color 0.3s;
    }
    .pricing-palden .pricing-action:hover, .pricing-palden .pricing-action:focus {
        background-color: #100a13;
    }
    .pricing-palden .pricing-item--featured .pricing-deco {
        padding: 5em 0 8.885em 0;
    }
</style>

<body id="page-top">

<div id="">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion m-0" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    JC
                </div>
                <div class="sidebar-brand-text mx-3">JUNIOR Club</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Главная</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Основные
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Профиль</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book"></i>
                    <span>Предметы</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Мои предметы:</h6>
                        {{--                    @foreach(Auth::user()->subjects as $subject)--}}
                        {{--                        <a class="collapse-item" href="#">{{ $subject->name }}</a>--}}
                        {{--                    @endforeach--}}
                        <a class="collapse-item" style="background-color: #c2c047; color: #fff" href="{{ route('subjects') }}">Все предметы</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-graduate"></i>
                    <span>Студенты</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Мои Студенты:</h6>
                        @foreach(Auth::user()->students->take(5) as $student)
                            <a class="collapse-item" href="#">
                                {{ $student->name }}
                            </a>
                        @endforeach
                        <a class="collapse-item" style="background-color: #c2c047; color: #fff" href="{{ route('students', Auth::user()) }}">Все студенты</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Выйти</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            @if(Auth::user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.users') }}" >
                        <i class="fas fa-user"></i>
                        <span>Пользователи</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.products') }}" >
                        <i class="fas fa-book"></i>
                        <span>Предметы</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.orders') }}" >
                        <i class="fas fa-shopping-basket"></i>
                        <span>Заказы</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.upload') }}" >
                        <i class="far fa-images"></i>
                        <span>Галерея</span>
                    </a>
                </li>
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column m-0">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('img/avatars/') }}/{{ Auth::user()->avatar }}">
                                <span class="mx-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->name }}</span>
                                <i class="fas fa-sort-down mb-2 mx-2"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Профиль
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="app">
                    @yield('content')
                </div>

            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script>
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }

    });
</script>
@yield('script')



</body>

</html>
