<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
class Offers extends Controller
{
   public function index(){
    $rows = Product::all();
    return view('back-end.admin.offers.index',compact('rows'));
}
    public function create(){
        return view('back-end.admin.offers.create');
    }
    public function store(Request $request){
        $fileName = $this->fileUpload($request);
        $requestArray =  ['image' => $fileName] + ['type' => 'offer'] + $request->all();
        $row = Product::create($requestArray);
        return redirect()->route('offers.index');
    }
    public function edit($id){
        $rows = Product::FindOrFail($id);
        return view('back-end.admin.offers.edite',compact('rows'));
    }
    public function update(Request $request,$id){
        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileUpload($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $row = Product::FindOrFail($id);
        $row->update($requestArray);
        return redirect()->route('offers.index');
    }
    public function destroy($id)
    {
        Product::FindOrFail($id)->delete();

        return redirect()->route('offers.index');
    }
  public function fileUpload(Request $request) {
    $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.'png';
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        // $this->save();

        return url('images/'.$name);
    }
    }
}
