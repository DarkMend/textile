@extends('layouts.base')
@section('content')
<section class="product">
    <div class="container">
        <div class="page-title page-title__left">
            <p>Товар</p>
            @auth
            @if (auth()->user()->role == 'admin')
            <div class="wrapper">
                <a href="{{ route('product.edit', $product->id) }}" class="button__action">Редактировать</a>
                <form action="{{ route('product.delete', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="button__action">Удалить</button>
                </form>
            </div>
            @endif
            @endauth
        </div>
        <div class="product__wrapper">
            <div class="product__wrapper-img">
                <img src="{{ asset('/storage/' . $product->img) }}" alt="">
            </div>
            <div class="product__wrapper-info">
                <div class="product__wrapper-info__title">
                    {{ $product->title }}
                </div>
                <div class="product__wrapper-info__text">
                    {{ $product->description }}
                </div>
                <div class="product__wrapper-info__price">
                    <div>
                        {{ $product->price }} руб.
                    </div>
                </div>
                @auth
                @if (auth()->user()->role == 'user')
                @php
                $user = auth()->user();
                $isCart = $user->products->contains($product->id)
                @endphp
                @if ($isCart)
                <form action="{{ route('cart.delete', $product->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button href="{{ route('cart.delete', $product->id) }}" class="button">
                        Удалить с корзины
                    </button>
                </form>
                @else
                <a href="{{ route('cart.store', $product->id) }}" class="button">
                    Добавить в корзину
                </a>
                @endif
                @endif
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection