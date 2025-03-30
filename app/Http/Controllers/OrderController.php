<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        if (auth()->user()->role == 'admin') {
            $orders = Order::all();
        }

        if (auth()->user()->role == 'user') {
            $user = auth()->user();
            $orders = $user->orders;
        }
        return view('pages.orders', compact('statuses', 'orders'));
    }

    public function store()
    {
        $user = auth()->user();

        DB::transaction(function () use ($user) {
            $total_price = 0;
            $products = $user->products;

            foreach ($products as $product) {
                $total_price += $product->price * $product->pivot->count;
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'price' => $total_price
            ]);

            foreach ($products as $product) {
                $order->products()->attach($product->id, ['count' => $product->pivot->count]);
            }

            Cart::where('user_id', auth()->id())->delete();
        });

        return redirect()->route('order.index');
    }

    public function changeStatus(Order $order){
        $order->update([
            'status_id' => $order->status_id + 1
        ]);

        return redirect()->route('order.index');
    } 

    public function reject(Order $order){
        $order->update([
            'status_id' => 4
        ]);

        return redirect()->route('order.index');
    } 
}
