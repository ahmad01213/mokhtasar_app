<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cut;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Orders extends Controller
{
    public function store(Request $request){
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
//        if($request->payment_type == 'نقاط'){
//            $pointsperrial = DB::select('SELECT TEXT FROM PAGES WHERE TYPE = "points_per_rial" LIMIT 1');
//           $totalPoints=(($request->total_cost)*(int)($pointsperrial[0]->TEXT));
//            if(auth()->user()->points>$totalPoints){
//                auth()->user()->points = auth()->user()->points-$totalPoints;
//            }else{
//                return;
//            }
//        }
        $jsonProducts = $request->products;
        $productsJson = json_decode($jsonProducts);
        foreach($productsJson as $item){
            $jsonone = json_encode($item);
            $row['products'] = $jsonone;
            Order::create($row);
        }
        return response()->json('added_successfully');
    }
    public function index(){
        $rows = Order::all();
        foreach ($rows as $row){
            $jsonProducts = $row->products;
            $productsJson = json_decode($jsonProducts);
            $product = Product::find($productsJson->productId);
            $totalCost = $product->price*$productsJson->quantity;
            $row['total_cost'] = $totalCost;
        }
        return view('back-end.admin.orders.index',compact('rows'));
    }

      public function orderdetails($id){
          $order = Order::findOrFail($id);
          $jsonProducts = $order->products;
          $productsJson = json_decode($jsonProducts);
//          foreach($productsJson as $item){
//              $sizes[] = Size::findOrFail($item->size_id);
//              $products[] = Product::findOrFail($item->productId);
//              $sellers[] = User::findOrFail($item->seller_id) ;
//          }
          $products[] = Product::findOrFail($productsJson->productId);
              $quantities[] = $productsJson->quantity;

          return view('back-end.admin.orders.edite',compact('products','quantities'));
        }

    public function update(Request $request,$id){
        $requestArray = $request->all();
        $row = Order::FindOrFail($id);
        $row->update($requestArray);
        return redirect()->route('orders.index');
    }


      public function userorders(){
          $user = Auth::user();
          $sql = "SELECT* FROM orders WHERE user_id = '$user->id'";
        $orders = Order::all();
      $row =   DB::select($sql);
        return response()->json($row);
    }
}
