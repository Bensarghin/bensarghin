@extends('Guests.layouts.app')
@section('content')
@section('navbar','trends blogs')
@auth
@else
    <div class="row">
        <div class="col-md-8">
        @endauth
    @include('Guests.layouts.blogs')
@endsection
