<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Cut;
use App\Models\Page;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SellerProducts extends Controller
{
    public function index()
    {
        $rows = Product::all()->where('seller_id',Auth::user()->id);
        return view('back-end.seller.products.index', compact('rows'));
    }
    public function create()
    {
        return view('back-end.seller.products.create');
    }
    public function store(Request $request)
    {
        $fileName = $this->fileUpload($request);
        $requestArray = ['image' => $fileName] + $request->all() + ['type' => 'product'];
        $requestArray['seller_id'] = Auth::user()->id;
        $product = Product::create($requestArray);

//        $sizes = $request->size;
        $prices = $request->price;
//        for ($count = 0; $count < count($sizes); $count++) {
//            $data = new Size(array(
//                'name' => $sizes[$count],
//                'price' => $prices[$count]
//            ));
//            $product->sizes()->save($data);
//        }
        return redirect()->route('sellerproducts.index');
    }

    public function edit($id)
    {
        $rows = Product::FindOrFail($id);
        $sizes= $rows ->sizes;
        return view('back-end.seller.products.edite', compact('rows','sizes'));
    }

    public function update(Request $request, $id)
    {
        $requestArray = $request->all();
        $requestArray['seller_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            $fileName = $this->fileUpload($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = Product::FindOrFail($id);
        $row->sizes()->delete();
        $sizes = $request->size;
        $prices = $request->price;
        for ($count = 0; $count < count($sizes); $count++) {
            $row->sizes()->save(new Size(array(
                'name' => $sizes[$count],
                'price' => $prices[$count]
            )));
        }
        $row->update($requestArray);
        return redirect()->route('sellerproducts.index');
    }

    public function destroy($id)
    {
        Product::FindOrFail($id)->delete();
        return redirect()->route('sellerproducts.index');
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
}
