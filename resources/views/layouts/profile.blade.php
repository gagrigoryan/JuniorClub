@extends('home')

@section('content')
        <profile-component csrf="{{ csrf_token() }}"></profile-component>
@endsection
