@extends('welcome')

@section('content')
    <div class="container py-5" style="font-family: 'Nunito', sans-serif;">
        <div class="row text-center text-white my-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 text-black-50">Галерея</h1>
            </div>
        </div>
        <div class="gallery my-5 text-center">
            @foreach(Storage::disk('public')->files('uploads/') as $file)
                <a class="mx-2" data-fancybox="gallery" href="{{ asset('/storage/') . '/' . $file}}">
                    <img class="gallery-img" style="width: 200px;" src="{{ asset('/storage/uploads/thumbnails/') . '/' . explode('/', $file)[1]}}">
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

    $('.navbar').addClass('bg-light navbar-light shadow').removeClass('navbar-dark');
    $('#registerBtn').removeClass('btn-outline-primary').addClass('btn-primary');

    $('[data-fancybox="gallery"]').fancybox({
        thumbs : {

        },
        buttons: [
            "zoom",
            //"share",
            "slideShow",
            //"fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        touch: {

        },
        mobile: {

        },
    });
@endsection
