<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();
        $categories = Category::all();

        if($request->has('category_id')){
            $category = $request->input('category_id');
            $products->where('category_id', $category);
        }

        $products = $products->get();

        return view('pages.catalog', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.add-product', compact('categories'));
    }

    public function show(Product $product)
    {
        return view('pages.product', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'img' => ['required', 'mimes:jpeg,jpg,png'],
            'category_id' => ['required']
        ], [
            'title.required' => 'Заполните название',
            'description.required' => 'Заполните описание',
            'price.required' => 'Заполните цену',
            'price.numeric' => 'Цена должна быть числом',
            'img.required' => 'Выберите изображение',
            'img.mimes' => 'Изображение должно быть типа: jpeg, jpg, png',
        ]);

        unset($data['img']);
        $image = $request->file('img')->store('products');
        $data['img'] = $image;

        Product::create($data);

        return redirect()->route('product.catalog');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'img' => ['mimes:jpeg,jpg,png'],
            'category_id' => ['required']
        ], [
            'title.required' => 'Заполните название',
            'description.required' => 'Заполните описание',
            'price.required' => 'Заполните цену',
            'price.numeric' => 'Цена должна быть числом',
            'img.required' => 'Выберите изображение',
            'img.mimes' => 'Изображение должно быть типа: jpeg, jpg, png',
        ]);

        if(!$request->hasFile('img')){
            $data['img'] = $product->img;
        }else{
            $image = $request->file('img')->store('products');

            if($product->img && Storage::exists($product->img)){
                Storage::delete($product->img);
            }

            $data['img'] = $image;
        }

        $product->update($data);

        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product) {
        if($product->img && Storage::exists($product->img)){
            Storage::delete($product->img);
        }
        $product->delete();
        return redirect()->route('product.catalog');
    }
}
