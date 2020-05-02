@component('mail::message')
    <h3 style="color: #1976D2">Привет!</h3><br>
    Пожалуйста нажмите на кнопку, чтобы активироваить ваш аккаунт! <br>

    @component('mail::button', ['url' => $url, 'color' => 'primary'])
        Подтвердить
    @endcomponent

    <hr>
    Или же перейдите по <a href="{{ $url }}">ссылке</a>
@endcomponent
