@extends('layouts.base')
@section('content')
<section class="orders">
    <div class="container">
        <div class="page-title page-title__left">
            Заказы
        </div>
        <div class="orders__wrapper">
            @foreach ($statuses as $status)
            <div class="order__wrapper-status">
                <div class="status__title">
                    {{ $status->title }}
                </div>
                <div class="order__wrapper-status__wrapper">
                    @foreach ($orders as $order)
                    @if ($order->status_id == $status->id)
                    <div class="order__wrapper-status__wrapper-item">
                        <div class="order-id">
                            Номер заказа: {{ $order->id }}
                        </div>
                        <div class="products-wrapper">
                            <div class="text">Товары</div>
                            <div class="products-wrapper__items">
                                @foreach ($order->products as $product)
                                <div class="img">
                                    <img src="{{ asset('/storage/' . $product->img) }}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="order-id">
                            Общая стоимость заказа: {{ $order->price }} руб.
                        </div>
                        @if (auth()->user()->role == 'admin')
                        <div class="order-id">
                            Имя пользователя пользователя: {{ $order->user->name }}
                        </div>
                        @endif
                        <div class="actions">
                            @if (auth()->user()->role == 'admin')
                            @if ($order->status_id != 3)
                            <form action="{{ route('order.changeStatus', $order->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button class="action-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right">
                                        <path d="M18 8L22 12L18 16" />
                                        <path d="M2 12H22" />
                                    </svg>
                                </button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection