@extends('layouts.auth')
@section('content')
<section class="auth">
    <div class="page-title">
        Регистрация
    </div>
    <form action="{{ route('auth.store') }}" class="form-auth" method="post">
        @csrf
        <div class="input__wrapper">
            <input type="text" class="input" placeholder="Введите имя" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
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
        <div class="input__wrapper">
            <input type="password" class="input" placeholder="Подтверждение пароля" name="password_confirmation">
            @error('password_confirmation')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button class="button">
            Регистрация
        </button>
    </form>
    <a href="{{ route('auth.login') }}">Есть аккаунт? - Войти</a>
</section>
@endsection