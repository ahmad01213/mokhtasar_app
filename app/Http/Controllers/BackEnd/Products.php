<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Bid;
use App\Models\Cut;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Size;
use App\User;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Products extends Controller
{
    public function index()
    {
        $rows = Product::all();
        return view('back-end.admin.products.index', compact('rows'));
    }

    public function create()
    {
        return view('back-end.admin.products.create');
    }

    public function store(Request $request)
    {
        $fileName = $this->fileUpload($request);
        $requestArray = ['image' => $fileName] + $request->all() + ['type' => 'product'];
        $product = Product::create($requestArray);

        $cuts = $request->cut;
        $sizes = $request->size;
        $prices = $request->price;
        for ($count = 0; $count < count($sizes); $count++) {
            $data = new Size(array(
                'name' => $sizes[$count],
                'price' => $prices[$count]
            ));
            $product->sizes()->save($data);
        }
        foreach ($request->cut as $item) {
            $cutdata = new  Cut(array("cut"=>$item));
            $product->cuts()->save($cutdata);
        }
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $rows = Product::FindOrFail($id);
        $sizes= $rows ->sizes;
        return view('back-end.admin.products.edite', compact('rows','sizes'));
    }

    public function update(Request $request, $id)
    {
        $requestArray = $request->all();
        if ($request->hasFile('image')) {
            $fileName = $this->fileUpload($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = Product::FindOrFail($id);
//        $row->sizes()->delete();
//        if ($request->has('size')) {
//            $sizes = $request->size;
//            $prices = $request->price;
//            for ($count = 0; $count < count($sizes); $count++) {
//                $row->sizes()->save(new Size(array(
//                    'name' => $sizes[$count],
//                    'price' => $prices[$count]
//                )));
//            }
//        }
        $row->update($requestArray);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Product::FindOrFail($id)->delete();
        return redirect()->route('products.index');
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . 'png';
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            // $this->save();

            return url('images/' . $name);
        }
    }

    public function getProductsResponse()
    {
        $products = Product::all()->where('published','1');
        $products = $products->filter(function($product){
            $seller = $product->user;
            return explode('&&&', $seller->info)[2] == 'active';
        });
        $sellers = User::select('id','phone','name','info')->where('role','seller')->get();

        $response['pages'] = Page::all();
        if (Auth::guard('api')->check()) {
            foreach ($products as $product) {
                $id = $product->id;
                $user = auth()->guard('api')->user();
                $user_id = $user->id;
                $response['user_details'] = $user;
            }
        }

             foreach ($products as $product){
                 $seller = $product->user;
                 $products->except($product->id);
                 $product['seller'] = new UserResource($seller);
                 unset($product['user']);
             }
        $response['products'] = $products;
        $response['sellers'] = $sellers;
        $response['slider'] = DB::select("SELECT image FROM slider");
        return response()->json($response);
    }
}
