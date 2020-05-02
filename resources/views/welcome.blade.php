<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'vvxJJqD8xPfWEFjPq';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = 'https://call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Junior CLUB">
    <meta property="og:title" content="Клуб робототехники и моделизма">
    <meta property="og:description" content="Ваш ребенок создаст робота и научится управлять RC автомоделью уже на первом занятии!">
    <meta property="og:url" content="https://juniorclubtver.ru/">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image" content="{{ asset('img/og/og_img.jpg') }}">
    <meta property="og:image:width" content="750">
    <meta property="og:image:height" content="724">
    <title>Junior CLub</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<style>

</style>
<body id="body">
    <nav class="fixed-top navbar navbar-expand-lg navbar-dark py-0 pr-5">
        <a class="navbar-brand" href="/">JC</a>
        <button onclick="navbarLight()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            <span class="navbar-text">jun1or.club@yandex.ru</span>
            <ul class="navbar-nav m-auto">
                <li class="nav-item px-2 @if(Request::path() == '/') active @endif()">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                <li class="nav-item px-2 @if(Request::path() == 'subjects') active @endif()">
                    <a class="nav-link" href="{{ route('main.subjects') }}">Наши курсы</a>
                </li>
                <li class="nav-item px-2 @if(Request::path() == 'teachers') active @endif()">
                    <a class="nav-link" href="{{ route('teachers') }}">Преподаватели </a>
                </li>
                <li class="nav-item px-2 @if(Request::path() == 'gallery') active @endif()">
                    <a class="nav-link" href="{{ route('gallery') }}">Галерея</a>
                </li>
{{--                <li class="nav-item px-2">--}}
{{--                    <a class="nav-link" href="#">Галерея</a>--}}
{{--                </li>--}}
                <li class="nav-item px-2 @if(Request::path() == 'contacts') active @endif()">
                    <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                </li>
            </ul>

            <ul class="navbar-nav nav-flex-icons pl-md-3 my-3 my-md-0 align-items-center">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item avatar mr-2">
                            <a href="{{ route('home') }}" class="nav-link p-0 d-flex align-items-center">
                                <span class="px-3">{{ Auth::user()->name }}</span>
                                {{--}}<img src="{{ asset('img/gal.jpg') }}" class="rounded-circle z-depth-0"
                                     alt="avatar image" height="35" width="35">--}}
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <a class="btn btn-primary mx-2 login-btn my-1" href="{{ route('login') }}">Вход</a>
                        @if (Route::has('register'))
                            <a id="registerBtn" class="btn btn-outline-primary mx-2 my-1 register-btn" href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @endauth
                @endif
            </ul>

        </div>
    </nav>

    <div class="app">
        @yield('content')
    </div>




    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/particles.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        let navbarToggled = true
        function navbarLight() {
            if (navbarToggled) {
                navbarToggled = !navbarToggled
                $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
                $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
            } else {
                navbarToggled = !navbarToggled
                if ($(document).scrollTop() > 50) {
                    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
                    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
                } else {
                    $('#registerBtn').removeClass('btn-primary').addClass('btn-outline-primary');
                    $('.navbar').addClass('navbar-dark').removeClass('bg-light navbar-light shadow');
                }
            }

        }

        if ($(window).width() < 600) {
            $('#grid').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '100px',
                slidesToShow: 1,
                autoplay: true,
            })
        } else {
            particlesJS.load('grid', 'js/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
        }
        @yield('scripts')
    </script>
</body>
</html>
