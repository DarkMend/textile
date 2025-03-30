@extends('layouts.base')
@section('content')
<section class="catalog">
    <div class="container">
        <div class="page-title page-title__left">
            <p>КАТАЛОГ</p>
            @auth
            @if(auth()->user()->role == 'admin')
            <div class="page-title__wrapper">
                <a class="button__action" href="{{ route('category.index') }}"> Все категории</a>
                <a class="button__action" href="{{ route('product.create') }}"> Добавить товар</a>
                <a class="button__action" href="{{ route('category.create') }}"> Добавить категорию</a>
            </div>
            @endif
            @endauth
        </div>
        <div class="categories">
            <form action="{{ route('product.catalog') }}" method="get">
                @csrf
                <a href="{{ route('product.catalog') }}" class="button @if (empty(request('category_id')))
                    active
                @endif">Все</a>

                @foreach ($categories as $category)
                <button class="button @if ($category->id == request('category_id'))
                active
                @endif" name="category_id" value="{{ $category->id }}">{{ $category->title }}</button>
                @endforeach
            </form>
        </div>
        <div class="catalog__wrapper">
            @if (count($products) == 0)
            <div class="null">ТОВАРЫ ОТСУТСТВУЮТ</div>
            @endif
            @foreach ($products as $product)
            <div class="catalog__wrapper-item">
                <div class="catalog__wrapper-item__img">
                    <img src="{{ asset('/storage/' . $product->img) }}" alt="">
                </div>
                <div class="catalog__wrapper-item__wrapper">
                    <div class="text">
                        {{ $product->title }}
                    </div>
                    <div class="price">
                        {{ $product->price }} руб.
                    </div>
                </div>
                <a href="{{ route('product.show', $product->id) }}" class="catalog__wrapper-item__button button">
                    Подробнее
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection