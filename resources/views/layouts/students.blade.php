@extends('home')

@section('content')
    <div class="container-fluid">
        <students-component user-id="{{ Auth::user()->id }}"></students-component>
    </div>
@endsection
