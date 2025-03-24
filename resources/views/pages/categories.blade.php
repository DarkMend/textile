@extends('layouts.base')
@section('content')
<section class="product__form">
    <div class="container">
        <div class="page-title">
            Все категории
        </div>
        <div class="category__wrapper">
            @foreach ($categories as $category)
            <div class="category__wrapper-item">
                <div class="category__actions">
                    <a href="{{ route('category.edit', $category->id) }}" class="category__button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D45E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/></svg></a>
                    <form action="{{ route('category.delete', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="category__button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D45E5E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                        </button>
                    </form>
                </div>
                {{ $category->title }}
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection