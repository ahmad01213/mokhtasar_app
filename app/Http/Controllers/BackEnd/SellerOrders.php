<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerOrders extends Controller
{
    public function index(){
        $id = Auth::user()->id;
//        $rows = Order::whereRaw('JSON_CONTAINS(products, \'{"seller_id": '. $id .'\')')->get();
        $rows = Order::all()->filter(function($order){
            $jsonProducts = $order->products;
            $productsJson = json_decode($jsonProducts);
            $product = Product::find($productsJson->productId );
            return $product->seller_id == Auth::user()->id;
        });
        foreach ($rows as $row){
            $jsonProducts = $row->products;
            $productsJson = json_decode($jsonProducts);
            $product = Product::find($productsJson->productId);
            $totalCost = $product->price*$productsJson->quantity;
            $row['total_cost'] = $totalCost;
        }
        return view('back-end.seller.orders.index',compact('rows'));
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

        return view('back-end.seller.orders.edite',compact('products','quantities'));
    }
}
