@extends('home')

@section('content')
    <div class="container-fluid">
        <user-subjects user-id="{{ Auth::user()->id }}"></user-subjects>
    </div>
@endsection
