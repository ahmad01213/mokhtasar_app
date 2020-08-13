<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
class Favorites extends Controller
{
    public function store(Request $request){
        if ($request['status']==0){
          $fav = Favorite::where('user_id','=',auth()->user()->id)->where('product_id','=',$request['product_id'])->first();
          $fav->delete();
            return response()->json("تم الحذف بنجاح");
        }
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
        $order = Favorite::create($row);
        return response()->json($order);
    }

    public function showUserFavorites(){
        $user= auth()->user();
        $favorites = $user->favorites;
        return response()->json($favorites);
    }


    public function index(){
        $rows = Favorite::all();
        return view('back-end.admin.favorites.index',compact('rows'));
    }
}
