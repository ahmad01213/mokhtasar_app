<?php
namespace App;
use App\Models\Favorite;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    public $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'password','phone','points','role','info'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favorites(){
        return $this->hasMany(Favorite::class,'user_id');
    }
    public function notifications(){
        return $this->hasMany(Notification::class,'user_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'user_id');
    }
}
