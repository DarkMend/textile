@extends('main')
@section('layout')
    @yield('content')
    <a href="{{ route('index') }}" class="back">На главную</a>
@endsection