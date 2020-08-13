<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cut extends Model
{
    protected $fillable = [
        'product_id', 'cut'
    ];
}
