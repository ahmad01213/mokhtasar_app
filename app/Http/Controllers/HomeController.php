<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('admin/users');
        }

            public function home() {
                 $orders = Order::all();
                $users = User::all()->where('role','user');
                $sellers = User::all()->where('role','seller');
                 $products=Product::all();

                 $rows = $orders->take(10);
                foreach ($rows as $row){
                    $jsonProducts = $row->products;
                    $productsJson = json_decode($jsonProducts);
                    $product = Product::find($productsJson->productId);
             
                }                 $counts = [$orders->count(),$products->count(),$users->count(),$sellers->count()];
                 return view('back-end.admin.home.home',compact('rows','counts'));
                           }


    public function admin()
    {
        return redirect('login');
    }
    public function sellermain() {
        $orders = Order::all()->filter(function($order){
            $jsonProducts = $order->products;
            $productsJson = json_decode($jsonProducts);
            $product = Product::find($productsJson->productId );
            return $product->seller_id == Auth::user()->id;
        });
        foreach ($orders as $row){
            $jsonProducts = $row->products;
            $productsJson = json_decode($jsonProducts);
            $product = Product::find($productsJson->productId);
            $totalCost = $product->price*$productsJson->quantity;
            $row['total_cost'] = $totalCost;
        }
        $products=Product::all()->where('seller_id',Auth::user()->id);
        $rows = $orders->take(10);
        $counts = [$orders->count(),$products->count()];
        return view('back-end.seller.home.home',compact('rows','counts'));
    }
}
