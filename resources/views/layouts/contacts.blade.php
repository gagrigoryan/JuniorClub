@extends('welcome')

@section('content')
    <div class="container-fluid py-5 text-center" style="font-family: 'Nunito', sans-serif;">
        <h1 class="my-5" style="color: #78909c; text-transform:uppercase;">Контакты</h1>
        <div class="container card shadow-lg">
            <div class="row">
                <div class="col-md-7 m-0 p-0">
                    <div>
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac20c1f658983c45f20034f82d4c2c290cf28ed4b84c790864f360e2cce5f501a&amp;source=constructor" width="100%" height="550" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="col-md-5 m-0 p-0">
                    <div class="contacts__info shadow-lg px-2 py-3">
                        <div class="d-flex text-center align-items-center text-primary  my-4 px-5">
                            <i class="fas fa-map-marker-alt text-info mx-3"></i>
                            <p>просп. Победы, 11, Тверь, Россия</p>
                        </div>
                        <div class="d-flex text-center align-items-center text-primary  my-4 px-5">
                            <i class="fas fa-phone-alt text-info mx-3"></i>
                            <p>+7 (910) 647-53-03</p>
                        </div>
                        <div class="d-flex text-center align-items-center text-primary  my-4 px-5">
                            <i class="fas fa-paper-plane text-info mx-3"></i>
                            <p>jun1or.club@yandex.ru</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
@endsection
