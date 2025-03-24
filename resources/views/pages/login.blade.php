@extends('layouts.auth')
@section('content')
<section class="auth">
    <div class="page-title">
        Аутентификация
    </div>
    <form action="{{ route('auth.log') }}" class="form-auth" method="post">
        @csrf
        <div class="input__wrapper">
            <input type="text" class="input" placeholder="Введите почту" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="input__wrapper">
            <input type="password" class="input" placeholder="Введите пароль" name="password">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button class="button">
            Войти
        </button>
    </form>
    <a href="{{ route('auth.create') }}">Нет аккаунта? - Регистрация</a>
    
</section>
@endsection