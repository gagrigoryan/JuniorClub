@extends('welcome')

@section('content')
    <div class="container py-5">
        <div id="app">
            @auth
                <choose-product-component user-id="{{ Auth::user()->id }}"></choose-product-component>
            @else
                <subjects-component></subjects-component>
            @endauth
        </div>
    </div>
@endsection

@section('scripts')

    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');
@endsection
