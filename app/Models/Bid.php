<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Bid extends Model
{
    protected $fillable = [
        'user_id', 'mazad_id','bid'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
