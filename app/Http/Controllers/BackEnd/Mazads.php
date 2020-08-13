<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Mazad;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class Mazads extends Controller
{
    public function index()
    {
        $rows = Mazad::all();
        return view('back-end.admin.mazads.index', compact('rows'));
    }
    public function create()
    {
        return view('back-end.admin.mazads.create');
    }

    public function store(Request $request)
    {
        $requestArray = $request->all();
        Mazad::create($requestArray);
        return redirect()->route('mazads.index');
    }

    public function edit($id)
    {
        $rows = Mazad::FindOrFail($id);
        return view('back-end.admin.mazads.edite', compact('rows'));
    }

    public function update(Request $request, $id)
    {
        $row = Mazad::FindOrFail($id);
        $requestArray = $request->all();
        $row->update($requestArray);
        return redirect()->route('mazads.index');
    }

    public function destroy($id)
    {
        Mazad::FindOrFail($id)->delete();
        return redirect()->route('mazads.index');
    }

    public function destroybid($id)
    {
        Bid::FindOrFail($id)->delete();
        return redirect()->back();
    }

    public function getMazadBids($id)
    {
        $mazad = Mazad::FindOrFail($id);
        $rows = $mazad->bids;
        return view('back-end.admin.bids.index', compact('rows'));
    }
    public function getbidsresponse($id)
    {
        $mazad = Mazad::FindOrFail($id);
        $rows = $mazad->bids;
        foreach ($rows as $item){
            $user = \App\User::findOrFail($item['user_id']);
            unset($item['user_id']);
            $user_name = $user->name;
            $item['user_name'] = $user_name;
        }
        return response()->json($rows);
    }
    public function addbid(Request $request)
    {
        $requestArray = $request->all();
        $requestArray['user_id']=auth()->user()->id;
        Bid::create($requestArray);
        return response()->json('تم بنجاح');
    }
    public function notifusers(Request $request)
    {
        $user = Mazad::findOrFail($request->id);
        $client = new Client();
        $result = $client->request('POST', "https://fcm.googleapis.com/fcm/send", [
            'headers' => [
                'Authorization' => "key=AAAAiB9yOzI:APA91bFapNzv7JzkSf5u50BSLdjYJIEjITjLdUyeK_-0RulsZp37y9aIJklbYxAzi_XFOnbxBd3ZsHK19l_jJAByHxJrIQVGxOElYAlus-KhTqsGElXIsbNU-dkjNTot72UU-Pcf8qyS",
                'Content-Type' => 'application/json'
            ],
            'json' => ["to" => $user->device_token,
                'notification' => [
                    "title" => $request->title,
                    "body" => $request->message,
                    "sound" => "default"
                ]
            ]]);
        $requestArray['title']=$request->title;
        $requestArray['body']=$request->message;
        $requestArray['user_id']=$user->id;
        Notification::create($requestArray);
        return redirect()->back()->with('message', ' تم إرسال الرسالة بنجاح');
    }
}
