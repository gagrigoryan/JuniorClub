@extends('welcome')

@section('content')
    <div class="teachers__page" style="padding-top: 8rem;">
        <div class="container py-5">
            <div class="row text-center text-white">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-4">Наша команда</h1>
                </div>
            </div>
        </div><!-- End -->


        <div class="container">
            <div class="row text-center">

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t1.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Тихомирова Татьяна</h5><span class="small text-uppercase text-muted">Робототехника/Моделизм</span>
                        <p>
                            Педагог по робототехнике и моделизму для детей от 7 лет в клубе Junior club.
                            Закончила ИПОСТ, и магистратуру ИПОСТ, учитель начальных классов, магистр. Работает уже четыре года в Мбоу СОШ №18.
                        </p>
                    </div>
                </div><!-- End -->

                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t2.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Степанян Гарник</h5><span class="small text-uppercase text-muted">Робототехника/Моделизм</span>
                        <p>
                            Педагог по робототехнике и моделизму для детей от 7 лет в клубе Junior club.
                            Учился в Православной Гимназии.
                            Закончил Тверской колледж им.А.Н.Коняева по специальности - юриспруденция.
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t3.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Григорян Гор</h5><span class="small text-uppercase text-muted">Программирование</span>
                        <p>
                            Педагог по программированию для детей от 8 лет в клубе Junior club. Учится в ТвГУ, факультет Прикладной математики и кибернетики, направление ФИИТ.
                            Занимается WEB - разработкой.
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t4.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Артамонова Юлия</h5><span class="small text-uppercase text-muted">Робототехника</span>
                        <p>
                            Педагог по робототехнике для детей от 4 лет в клубе Junior club.
                            Училась в ТвГУ педагогический факультет.Психолого-педагогическое образование.
                            Обучалась по программе повышения квалификации "Роботехнология: подготовка учителей робототехники. Расширенный курс."
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t5.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Тупик Анастасия</h5><span class="small text-uppercase text-muted">Робототехника</span>
                        <p>
                            Педагог по робототехнике для детей от 4 лет в клубе Junior club.
                            Училась в ТвГУ таможенное дело, закончила курс по педагогике и психологии.
                            Проводила мастер - классы для студентов на мероприятиях ТвГУ. <br>
                            Увлекается фотографиями.
                        </p>

                    </div>
                </div>

                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/t6.jpg') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Нинуа Кристина</h5><span class="small text-uppercase text-muted">Антипродленка</span>
                        <p>
                            Ведет группу продленного дня и робототехнику для детей от 4 лет в клубе Junior club.
                            Учится в ТвГУ на педагогическом факультете "Начальное образование и иностранный язык". <br>
                            Увлечения: чтение иностранной литературы.
                        </p>
{{--                        <ul class="social mb-0 list-inline mt-3">--}}
{{--                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    $(window).scroll(function() {
    if ($(document).scrollTop() > 50) {

    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    } else {
    $('#registerBtn').removeClass('btn-primary').addClass('btn-outline-primary');
    $('.navbar').addClass('navbar-dark').removeClass('bg-light navbar-light shadow');
    }
    });
@endsection
