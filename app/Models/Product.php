<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->withPivot('count');
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'orders_products', 'product_id', 'order_id')->withPivot('count');
    }
}
