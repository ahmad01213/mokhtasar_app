<?php

namespace App\Models;
use App\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [
        'user_id', 'lat', 'lng', 'accepted', 'products', 'payment_type', 'selected_period'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
