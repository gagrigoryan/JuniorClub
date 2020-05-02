@extends('home')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('image.upload') }}"
              class="dropzone"
              id="my-awesome-dropzone">
            @csrf
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection
