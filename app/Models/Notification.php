<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'is_read',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
