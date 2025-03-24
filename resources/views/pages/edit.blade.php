@extends('layouts.base')
@section('content')
<section class="product__form">
    <div class="container">
        <div class="page-title">
            Редактирование товара
        </div>
        <form class="form" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="input__wrapper">
                <input type="text" class="input" placeholder="Нзвание" name="title" value="{{ $product->title }}">
                @error('title')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__wrapper">
                <input type="text" class="input" placeholder="Описание" name="description" value="{{ $product->description }}">
                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__wrapper">
                <input type="number" class="input" placeholder="Цена" name="price" value="{{ $product->price }}">
                @error('price')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__wrapper">
                <label for="img" class="input">
                    Выберите изображение
                    <input type="file" id="img" class="file-input" name="img">
                </label>
                @error('img')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input__wrapper">
                <select name="category_id" class="input">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                        selected
                    @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button class="button">Редактировать</button>
        </form>
    </div>
</section>
@endsection