@extends('welcome')

@section('content')
    <div class="main mt-5 " style=" font-family: 'Nunito', sans-serif; min-height: 100vh">
        <div class="jumbotron text-center">
            <h1 class="display-2"><i class="fa fa-check-circle text-success"></i></h1>
            <h1 class="display-3 text-success" style="font-weight: 300;">Заявка отправлена!</h1>
            <p class="lead"><strong>Мы скоро свяжемся с вами!</strong></p>
            <hr>
            <p>
                Пожалуйста <a class="request-link" href="\register">создайте аккаунт</a> для дальнейщего сотрудничества!
            </p>
            <p class="lead">
                Иммется аккаунт?
                <a class="btn btn-primary btn-sm ml-2" href="/login" role="button">Вход</a>
            </p>
        </div>
    </div>
@endsection

@section('scripts')
    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
@endsection
