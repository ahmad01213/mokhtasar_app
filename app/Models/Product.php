<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'desc','image','published','seller_id','unit','category'
    ];
    public function rates(){
        return $this->hasMany(Rate::class,'product_id');
    }
    public function sizes(){
        return $this->hasMany(Size::class,'product_id');
    }
    public function cuts(){
        return $this->hasMany(Cut::class,'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
