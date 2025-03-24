@extends('layouts.base')
@section('content')
<section class="product__form">
    <div class="container">
        <div class="page-title">
            Редактирование категории
        </div>
        <form class="form" action="{{ route('category.update', $category->id) }}" method="post" >
            @method('put')
            @csrf
            <div class="input__wrapper">
                <input type="text" class="input" placeholder="Нзвание" name="title" value="{{ $category->title }}">
                @error('title')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button class="button">Добавить</button>
        </form>
    </div>
</section>
@endsection