<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Contact;
use Illuminate\Http\Request;

class Rates extends Controller
{
    public function index(){
        $rows = Rate::all();
        return view('back-end.admin.rates.index',compact('rows'));
    }

    public function destroy($id)
    {
        Rate::FindOrFail($id)->delete();
        return redirect()->route('rates.index');
    }

    public function store(Request $request)
    {
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
        $rate=Rate::create($row);
        return response()->json($rate);
    }
    public function getRatesForProduct(Request $request)
    {
        $product_id = $request['product_id'];
        $product = Product::findOrFail($product_id);
        $rates = $product->rates;
        return response()->json($rates);
    }

  public function contactus(Request $request)
    {
        $row = $request->all();
        $message=Contact::create($row);
        return response()->json(['message'=>$message]);
    }
}
