<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Parteners extends Controller
{
    public function index()
    {
        $rows = User::all()->where('role','seller');
        return view('back-end.admin.parteners.index', compact('rows'));
    }
    public function create()
    {
        return view('back-end.admin.parteners.create');
    }
    public function store(Request $request)
    {
        $requestArray = $request->all();
        $fileName = $this->fileUpload($request);
        $info = $request->whats.'&&&'.$request->abouttext.'&&&'.$request->status.'&&&'.$fileName;
        $requestArray['info'] = $info;
        $requestArray['role'] = 'seller';
        $requestArray['password'] = Hash::make($requestArray['password']);
        User::create($requestArray);
        return redirect()->route('parteners.index');
           }
    public function edit($id)
    {
        $rows = User::FindOrFail($id);
        $seller = $rows;
        $info = $seller->info;
        $infoArray = explode('&&&', $info);
        $rows['whats'] = $infoArray[0];
        $rows['about']=$infoArray[1];
        $rows['status'] = $infoArray[2];
        $rows['image'] = $infoArray[3];
        return view('back-end.admin.parteners.edite', compact('rows'));
    }
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $fileName = $this->fileUpload($request);
            $info = $request->whats.'&&&'.$request->abouttext.'&&&'.$request->status.'&&&'.$fileName;
        }else{
            $seller =User::FindOrFail($id);
            $oldinfo = $seller->info;
            $infoArray = explode('&&&', $oldinfo);
            $fileName = $infoArray[3];
            $info = $request->whats.'&&&'.$request->abouttext.'&&&'.$request->status.'&&&'.$fileName;
        }
        $row = User::FindOrFail($id);
        $requestArray = $request->all();
        $requestArray['info'] = $info;
        if (isset($requestArray['password']) && $requestArray['password'] != "") {
            $requestArray['password'] = Hash::make($requestArray['password']);
        } else {
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        return redirect()->route('parteners.index');
    }
    public function destroy($id)
    {
        User::FindOrFail($id)->delete();
        return redirect()->route('parteners.index');
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
