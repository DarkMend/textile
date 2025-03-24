<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $user = User::findOrFail(auth()->user()->id);
        $products = $user->products;
        return view('pages.cart', compact('products'));
    }

    public function store(Product $product) {
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'count' => 1
        ]);

        return redirect()->route('cart.index');
    }

    public function destroy(Product $product) {
        $cart = Cart::where('user_id', auth()->id())->where('product_id', $product->id);
        $cart->delete();
        
        return redirect()->route('product.catalog');
    }

    public function changeCount(Request $request, Product $product) {
        $cart_item = Cart::where('user_id', auth()->id())->where('product_id', $product->id)->firstOrFail();
        if($request->has('removeCount')){
            $cart_item->update([
                'count' => $cart_item->count - 1
            ]);
        }

        if($request->has('addCount')){
            $cart_item->update([
                'count' => $cart_item->count + 1
            ]);
        }

        return redirect()->route('cart.index');
    }
}
