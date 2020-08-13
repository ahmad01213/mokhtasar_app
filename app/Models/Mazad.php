<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mazad extends Model
{
    protected $fillable = [
        'name','desc', 'minprice','starttime','endtime','published'
    ];
    public function bids(){
        return $this->hasMany(Bid::class,'mazad_id');
    }
}
