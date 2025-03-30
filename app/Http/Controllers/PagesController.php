<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $products = Product::limit(5)->get();
        return view('pages.mainPage', compact('products'));
    }

}
