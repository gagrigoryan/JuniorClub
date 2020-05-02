@extends('home')

@section('content')
    <div class="container">
        <choose-product-component
            :user-id="{{ Auth::user()->id }}"
        ></choose-product-component>
    </div>
@endsection
