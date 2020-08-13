<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerSettings extends Controller
{

    public function editSettings(){
        $seller = Auth::user();
        $info = $seller->info;
        $infoArray = explode('&&&', $info);
        $row['name'] = $seller->name;
        $row['phone']= $seller->phone;
        $row['whats'] = $infoArray[0];
        $row['about']=$infoArray[1];
        $row['status'] = $infoArray[2];
        $row['image'] = $infoArray[3];
        return view('back-end.seller.settings.edit',compact('row'));
    }

    public  function updateSettings(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        if ($request->hasFile('image')) {
            $fileName = $this->fileUpload($request);
            $info = $request->whats.'&&&'.$request->abouttext.'&&&'.$request->status.'&&&'.$fileName;
        }else{
            $seller = Auth::user();
            $oldinfo = $seller->info;
            $infoArray = explode('&&&', $oldinfo);
            $fileName = $infoArray[3];
            $info = $request->whats.'&&&'.$request->abouttext.'&&&'.$request->status.'&&&'.$fileName;
        }
        DB::update("UPDATE users SET info = '$info', name = '$name', phone = '$phone' WHERE id = '$user_id'");

        return redirect()->route('sellersettings.edite')->with('message', ' تم حفظ التعديلات  بنجاح');
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
