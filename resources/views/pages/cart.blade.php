@extends('layouts.base')
@section('content')
<section class="cart">
    <div class="container">
        <div class="page-title page-title__left">
            Корзина
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <button class="button">Оформить заказ</button>
            </form>
        </div>
        <div class="cart__wrapper">
            @if(count($products) == 0)
            <div class="null">В вашей корзине нет товаров</div>
            @endif
            @foreach ($products as $product)
            <div class="cart__wrapper-item">
                <div class="cart__wrapper-item__start">
                    <div class="img">
                        <img src="{{ asset('/storage/' . $product->img) }}" alt="">
                    </div>
                    <div class="text">
                        {{ $product->title }}
                    </div>
                    <div class="text">
                        {{ $product->price }} руб.
                    </div>
                </div>
                <div class="cart__wrapper-item__end">
                    <form action="{{ route('cart.delete', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="button">Удалить</button>
                    </form>
                    <div class="cart__wrapper-item__end-counter">
                        <form action="{{ route('cart.changeCount', $product->id) }}" method="post">
                            @csrf
                            <button class="button__counter" name="removeCount" @if ($product->pivot->count == 1)
                                disabled
                                @endif>-</button>
                        </form>
                        <div class="counter">{{ $product->pivot->count }}</div>
                        <form action="{{ route('cart.changeCount', $product->id) }}" method="post">
                            @csrf
                            <button class="button__counter" name="addCount">+</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection