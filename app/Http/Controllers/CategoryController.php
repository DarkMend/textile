<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::all();
        return view('pages.categories', compact('categories'));
    }

    public function create() {
        return view('pages.add-category');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'title' => ['required', 'string', 'unique:categories']
        ], [
            'title.required' => 'Заполните название',
            'title.unique' => 'Такое название уже существует'
        ]);

        Category::create($data);

        return redirect()->route('product.catalog');
    }

    public function edit(Category $category) {
        return view('pages.edit-category', compact('category'));
    }

    public function update(Request $request, Category $category){
        $data = $request->validate([
            'title' => ['required', 'string', 'unique:categories']
        ], [
            'title.required' => 'Заполните название',
            'title.unique' => 'Такое название уже существует'
        ]);

        $category->update($data);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
