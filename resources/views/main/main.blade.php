@extends('welcome')

@section('content')
    <header class="header" id="header">
        <svg id="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,160L1440,224L1440,320L0,320Z"></path>
        </svg>


        <div class="container-fluid header__wrapper">
            <div class="row" id="row">
                <div class="col-md-6 col-sm-12">
                    <div class="header__content mt-md-4 px-md-5">
                        <div class="header__content-caption text-center">
                            <h1>Добро пожаловать в</h1>
                            <h1>Junior CLUB</h1>
                        </div>
                        <div class="header__content-text text-center mt-4">
                            <p>Мы приоткроем двери в увлекательный и необъятный мир роботов и технологий! <br>
                                Запишитесь на первое пробное занятие в Клуб Моделизма и Робототехники
                            </p>
                        </div>
                        <div class="header__btn">
                            <a href="javascript://0" onclick="slowScroll('#contact-us')" class="button instagram"><span class="gradient"></span>Записаться</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mt-5">
                    <div class="header__img" id="header__img">
                        <img src="{{ asset('img/v2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="cards">

        <div class="container">
            <h1 class="text-center text mb-4">Что мы предлагаем...</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card advantage-card shadow-lg rounded py-4 px-4 mt-4">
                        <i class="fas fa-check-square" style="color: #0099ff"></i>
                        <h3 class="card-title mt-4">Качественное образование</h3>
                        <p class="card-text mt-1">
                            Профессиональные педагоги, современное оборудование, постоянное повышение квалификации педагогов.
                        </p>
                        <a href="javascript://0" onclick="slowScroll('#contact-us')" class="card-link mt-2">Хочу попробовать&nbsp;&#8594;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card advantage-card shadow-lg rounded py-4 px-4 mt-4">
                        <i class="fas fa-graduation-cap" style="color: #E91E63"></i>
                        <h3 class="card-title mt-4">Профессиональный педагогический состав</h3>
                        <p class="card-text mt-1">
                            Все наши педагоги имею высшее образование и по специальности являются учителями начальных классов.
                        </p>
                        <a href="javascript://0" onclick="slowScroll('#contact-us')" class="card-link mt-2">Хочу попробовать&nbsp;&#8594;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card advantage-card shadow-lg rounded py-4 px-4 mt-4">
                        <i class="fas fa-code-branch" style="color: #4527A0"></i>
                        <h3 class="card-title mt-4">Обучение профессиям будущего</h3>
                        <p class="card-text mt-1">
                            Программирование <span style="color: #D81B60">|</span> Пилотирование беспилотных летательных аппаратов <span style="color: #3949AB">|</span> Инженерия <span style="color: #FFB300">|</span> 3D моделирование.
                        </p>
                        <a href="javascript://0" onclick="slowScroll('#contact-us')" class="card-link mt-2">Хочу попробовать&nbsp;&#8594;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subjects">
        {{--        <svg id="wave-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">--}}
        {{--            <path fill="#0099ff" fill-opacity="1" d="M0,64L1440,0L1440,0L0,0Z"></path>--}}
        {{--        </svg>--}}
        <h1 style="color: #6c757d;">Чему мы учим</h1>
        <div class="blog-slider">

            <div class="blog-slider__wrp swiper-wrapper">
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">

                        <img src="{{ asset('img/p1.jpg') }}" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">#Программы #Разработка</span>
                        <div class="blog-slider__title">Программирование</div>
                        <div class="blog-slider__text">
                            Курсы программирования научат вашего ребёнка понимать язык компьютеров и с помощью кода ставить системные задачи, а также контролировать их выполнение. Сделайте первый шаг на пути к освоению сферы будущего. Объёмные знания и многочисленные умения превратят хобби в любимое дело.
                        </div>
                        @auth
                            <a class="blog-slider__button" href="{{ route('product.choose', Auth::user()) }}">Приобрести</a>
                        @else
                            <a class="blog-slider__button" href="/register">Приобрести</a>
                        @endauth
                    </div>
                </div>
                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="{{ asset('img/r.jpg') }}" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">#Роботы #Программы #Искуственный интеллект</span>
                        <div class="blog-slider__title">Робототехника</div>
                        <div class="blog-slider__text">
                            Робототехника может стать любимым хобби вашего ребёнка. За несколько занятий наши преподаватели научат его конструировать роботов. Курсы по робототехнике не только научат и вызовут интерес к сфере будущего, но и в игровой форме помогут развить логическое мышление.
                        </div>
                        @auth
                            <a class="blog-slider__button" href="{{ route('product.choose', Auth::user()) }}">Приобрести</a>
                        @else
                            <a class="blog-slider__button" href="/register">Приобрести</a>
                        @endauth
                    </div>
                </div>

                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="{{ asset('img/modelism.jpg') }}" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">#Модели #Конструкторы #Авиамоделизм</span>
                        <div class="blog-slider__title">Моделизм</div>
                        <div class="blog-slider__text">
                            Изучение строения настоящих автомобилей, работы электронного и топливного двигателя может быть очень интересным занятием как для мальчиков, так и для девочек. На наших курсах моделизма Вашему ребёнку не придётся скучать, и освоение, возможно, будущей профессии начнётся уже сейчас.
                        </div>
                        @auth
                            <a class="blog-slider__button" href="{{ route('product.choose', Auth::user()) }}">Приобрести</a>
                        @else
                            <a class="blog-slider__button" href="/register">Приобрести</a>
                        @endauth
                    </div>
                </div>

                <div class="blog-slider__item swiper-slide">
                    <div class="blog-slider__img">
                        <img src="{{ asset('img/3dModeling.png') }}" alt="">
                    </div>
                    <div class="blog-slider__content">
                        <span class="blog-slider__code">#3D Модели #Компьютерная графика</span>
                        <div class="blog-slider__title">3D Моделирование</div>
                        <div class="blog-slider__text">
                            На курсах 3D-моделирования ваши дети научаться пользоваться специализированными программами для создания пространственных объектов. Наши преподаватели с вниманием отнесутся к вашему ребёнку, привив ему нужные навыки для определённого вида производств.
                        </div>
                        @auth
                            <a class="blog-slider__button" href="{{ route('product.choose', Auth::user()) }}">Приобрести</a>
                        @else
                            <a class="blog-slider__button" href="/register">Приобрести</a>
                        @endauth
                    </div>
                </div>

            </div>
            <div class="blog-slider__pagination"></div>
        </div>
    </section>

    <section class="price-list">
        <svg id="wave"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#9e02c5" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,176C420,171,480,213,540,240C600,267,660,277,720,256C780,235,840,181,900,149.3C960,117,1020,107,1080,106.7C1140,107,1200,117,1260,117.3C1320,117,1380,107,1410,101.3L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>
        <svg id="wave-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path style="fill: #fff;" fill="#9e02c5" fill-opacity="1" d="M0,64L60,80C120,96,240,128,360,117.3C480,107,600,53,720,42.7C840,32,960,64,1080,101.3C1200,139,1320,181,1380,202.7L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
        </svg>
        <div class="price-slider" id="price-slider">
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Робототехника</h4>
                        <h2>&#8381;2200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>4 занятия в месяц</li>
                            <li>Повышение мотивации</li>
                            <li>Развитие логики</li>
                            <li>Работа в команде</li>
                            <li>Современное<br>оборудование</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Моделизм</h4>
                        <h2>&#8381;2200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>4 занятия</li>
                            <li>Радиоуправляемые<br>модели</li>
                            <li>Автомоделизм</li>
                            <li>Авиомоделизм</li>
                            <li>Схемотехника</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Программирование</h4>
                        <h2>&#8381;2200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>4 занятия</li>
                            <li>Изучение Python</li>
                            <li>Изучение Scratch</li>
                            <li>Прикладная<br>математика</li>
                            <li>Разработка GUI</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Робототехника-моделизм</h4>
                        <h2>&#8381;4200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>8 занятий</li>
                            <li>работа с EV3</li>
                            <li>работа с LEGO</li>
                            <li>Радиоуправляемые<br>модели</li>
                            <li>Пайка</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Робототехника-Программирование</h4>
                        <h2>&#8381;4200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>8 занятий</li>
                            <li>Изучение PYTHON</li>
                            <li>Изучение Scratch</li>
                            <li>Радиоуправляемые<br>модели</li>
                            <li>Пайка</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Моделизм-Программирование</h4>
                        <h2>&#8381;4200<span>/1 месяц</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>8 занятий</li>
                            <li>работа с EV3</li>
                            <li>работа с LEGO</li>
                            <li>Изучение PYTHON</li>
                            <li>Изучение Scratch</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="price-slider-item">
                <div class="price-table">
                    <div class="price-header">
                        <h4>Робототехника</h4>
                        <h2>&#8381;6600<span>/3 месяца</span></h2>
                    </div>
                    <div class="price-content">
                        <ul>
                            <li>12 занятий</li>
                            <li>Повышение мотивации</li>
                            <li>Работа с LEGO</li>
                            <li>Работа в команде</li>
                            <li>Современное<br>оборудование</li>
                        </ul>
                    </div>
                    <div class="price-button">
                        @auth
                            <a href="{{ route('product.choose', Auth::user()) }}">Купить</a>
                        @else
                            <a href="/register">Купить</a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="teachers">
        <h1>Лица нашего клуба!</h1>
        <div class="grid" id="grid">
            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 100px; height: 100px; top: 25%; left: 28%;" data-tooltip="Робототехника/моделизм"><img class="rounded-circle" src="{{ asset('img/t1.jpg') }}" alt=""></div>
            </a>

            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 115px; height: 115px; top: 12%; left: 37%;" data-tooltip="Программирование"><img class="rounded-circle" src="{{ asset('img/t3.jpg') }}" alt=""></div>
            </a>
            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 130px; height: 130px; top: 38%; left: 38%;" data-tooltip="Робототехника/моделизм" data-tooltip-location="left"><img class="rounded-circle" src="{{ asset('img/t2.jpg') }}" alt=""></div>
            </a>
            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 140px; height: 140px; top: 20%; left: 48%;" data-tooltip="Робототехника"><img class="rounded-circle" src="{{ asset('img/t4.jpg') }}" alt=""></div>
            </a>
            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 115px; height: 115px; top: 45%; left: 54%;" data-tooltip="Робототехника"><img class="rounded-circle" src="{{ asset('img/t5.jpg') }}" alt=""></div>
            </a>
{{--            <a href="{{ route('teachers') }}">--}}
{{--                <div class="grid-item" style="width: 110px; height: 110px; top: 10%; left: 62%;" data-tooltip="3D Моделирование"><img class="rounded-circle" src="{{ asset('img/t4.jpg') }}" alt=""></div>--}}
{{--            </a>--}}

            <a href="{{ route('teachers') }}">
                <div class="grid-item" style="width: 105px; height: 105px; top: 30%; left: 66%;" data-tooltip="Антипродленка/робототехника"><img class="rounded-circle" src="{{ asset('img/t6.jpg') }}" alt=""></div>
            </a>


        </div>

    </section>

    <section class="contact-us text-center" id="contact-us">
        <svg id="wave-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,96C384,107,480,149,576,165.3C672,181,768,171,864,138.7C960,107,1056,53,1152,53.3C1248,53,1344,107,1392,133.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-10 offset-md-1">
                    <div class="contact-us__wrapper card shadow-lg px-md-5 py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 contact-us__form">
                                    <h2>Оставить заявку</h2>
                                    <form method="POST" action="{{ route('request.user') }}">
                                        <div class="form-group contact-us__form-content mb-4 px-4">
                                            @csrf
                                            <input name="name" type="text" class="form-control contact_us-input my-3" placeholder="ФИО" required>
                                            <input name="studentName" type="text" class="form-control contact_us-input my-3" placeholder="ФИО ребенка" required>
                                            <input name="email" type="email" class="form-control contact_us-input my-3" placeholder="Email" required aria-describedby="emailHelp">
                                            <input name="age" type="number" class="form-control contact_us-input my-3" placeholder="Возраст" required>
                                            <input name="phone" type="tel" class="form-control contact_us-input my-3" placeholder="Телефон" required>
                                        </div>
                                        <button style="border: none" type="submit" class="button instagram"><span class="gradient"></span>Отправить</button>
                                    </form>
                                </div>
                                <div class="col-md-7 p-sm-0">
                                    <div class="contact-us__img">
                                        <img src="{{ asset('img/contact_us.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="pt-5 pb-4" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 mt-2 mb-4">
                    <h5 class="mb-4 font-weight-bold">О НАС</h5>
                    <p class="mb-4">Junior CLUB - Клуб робототехники и моделизма.</p>
                    <ul class="f-address">
                        <li>
                            <div class="row">
                                <div class="col-1"><i class="fas fa-map-marker"></i></div>
                                <div class="col-10">
                                    <h6 class="font-weight-bold mb-0">Адрес:</h6>
                                    <p>г. Тверь, проспект Победы, д.11 <br>(вход со стороны теннисного корта)</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-1"><i class="far fa-envelope"></i></div>
                                <div class="col-10">
                                    <h6 class="font-weight-bold mb-0">Имеются вопросы?</h6>
                                    <p>jun1or.club@yandex.ru</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-1"><i class="fas fa-phone-volume"></i></div>
                                <div class="col-10">
                                    <h6 class="font-weight-bold mb-0">Телефон:</h6>
                                    <p>+7 (910) 647-53-03</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 mt-2 mb-4">
                    <h5 class="mb-4 font-weight-bold text-center">СОЦ СЕТИ</h5>
                    <ul class="social-pet mt-4 text-center">
                        <li><a href="https://vk.com/public180500450" title="vk"><i class="fab fa-vk"></i></a></li>
                        <li style="display: none"><a href="#" title="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li style="display: none"><a href="#" title="google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="https://www.instagram.com/junior_club_tver/" title="instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mt-2 mb-4 card">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac20c1f658983c45f20034f82d4c2c290cf28ed4b84c790864f360e2cce5f501a&amp;source=constructor" width="100%" height="350" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright -->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="text-center text-white">
                        &copy; 2020 Junior CLUB. Вcе права защищены. <br>
                        <span>Клуб робототехники и моделизма <i style="color: #29B6F6" class="far fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    var swiper = new Swiper('.blog-slider', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    mousewheel: {
    invert: false,
    },
    // autoHeight: true,
    pagination: {
    el: '.blog-slider__pagination',
    clickable: true,
    },
    autoplay: {
    delay: 5000,
    },
    });

    $('.price-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    responsive: [
    {
    breakpoint: 600,
    settings: {
    slidesToShow: 1,
    slidesToScroll: 1,
    }
    },
    ]
    });

    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
            $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
        } else {
            $('#registerBtn').removeClass('btn-primary').addClass('btn-outline-primary');
            $('.navbar').addClass('navbar-dark').removeClass('bg-light navbar-light shadow');
        }
    });

    function slowScroll(id) {
        let offset = -150;
        $('html, body').animate({
            scrollTop: $(id).offset().top - offset
        }, 1500);

        return false;
    }
@endsection
