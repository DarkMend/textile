@extends('main')
@section('layout')
    @include('includes.header')
    @yield('content')
    @if (request()->path() == '/')
    @include('includes.footer')
    @endif
@endsection