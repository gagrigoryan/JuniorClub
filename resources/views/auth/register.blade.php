@extends('welcome')

@section('content')
<div class="register__page py-5" style="min-height: 100vh; background: #fc5c7d; background: linear-gradient(to right, #fc5c7d, #6a82fb);">
    <div class="container">
       <div class="card p-5 mt-4 shadow-lg" style="border-radius: 1rem;">
           <div class="row align-items-center">
               <!-- For Demo Purpose -->
               <div class="col-md-6 pr-lg-7 mb-5 mb-md-0">
                   <img src="{{ asset('img/register_bg.png') }}" alt="" class="img-fluid mb-3 d-none d-md-block">
               </div>

               <!-- Registeration Form -->
               <div class="col-md-4 col-lg-5 ml-auto">
                   <form method="POST" action="{{ route('register') }}">
                       @csrf
                       <div class="row">

                           <!-- First Name -->
                           <div class="input-group col-lg-12 mb-4">
                               <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                               </div>
                               <input id="name" type="text" placeholder="ФИО" class="form-control bg-white border-left-0 border-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                               @error('name')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror

                           </div>

                           <!-- Email Address -->
                           <div class="input-group col-lg-12 mb-4">
                               <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                               </div>
                               <input id="email" type="email" placeholder="Введите Email" class="form-control bg-white border-left-0 border-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>

                           <!-- Phone Number -->
                           <div class="input-group col-lg-12 mb-4">
                               <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                               </div>
                               <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                   <option value="">+7</option>
                                   <option value="">+1</option>
                                   <option value="">+380</option>
                                   <option value="">+374</option>
                               </select>
                               <input id="phoneNumber" type="tel" name="phone" placeholder="Телефон" class="form-control bg-white border-md border-left-0 pl-3">
                           </div>.

                           <!-- Password -->

                           <div class="input-group col-lg-12 mb-4">
                               <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                               </div>
                               <input id="password" type="password" placeholder="Введите пароль" class="form-control bg-white border-left-0 border-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                               @error('password')
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>

                           <!-- Password Confirmation -->

                           <div class="input-group col-lg-12 mb-4">
                               <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                               </div>
                               <input id="password-confirm" type="password" placeholder="Повторите пароль" class="form-control bg-white border-left-0 border-md" name="password_confirmation" required autocomplete="new-password">
                           </div>

                           <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                   <button type="submit" class="btn btn-primary">
                                       Регистрация
                                   </button>
                               </div>
                           </div>


                           <div class="text-center w-100 mt-3">
                               <p class="text-muted font-weight-bold">Уже авторизованы? <a href="{{ route('login') }}" class="text-primary ml-2">Вход</a></p>
                           </div>

                       </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
{{--    <div class="row justify-content-center py-5">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection

@section('scripts')
    $(function () {
    $('input, select').on('focus', function () {
    $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
    $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
    });

    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
@endsection
