@extends('welcome')

@section('content')
<div class="main" style=" font-family: 'Nunito', sans-serif">
    <div class="text-center" style="margin-top: 25%; transform: translateY(-50%)">
        <h1 class="display-2"><i class="fa fa-info-circle text-info"></i></h1>
        <h1 class="display-4 text-info" style="font-weight: 300;">Подтверждение почты!</h1>
        @if (session('resent'))
            <p class="lead"><strong>Мы отправили сообщение на вашу почту!</strong></p>
        @endif


        <hr>
        Если сообщение не пришло, нажмите на ссылку!
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Отправить</button>.
        </form>
    </div>
</div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@section('scripts')
    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
@endsection
