<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function index(){
        $rows = Notification::all();
        return view('back-end.admin.notifications.index',compact('rows'));
    }
    public function store(Request $request)
    {
        $client = new Client();
        $result = $client->request('POST',"https://fcm.googleapis.com/fcm/send",[
            'headers' => [
                'Authorization' => "key=AAAAtlEE4zU:APA91bFTR43ExnsUzakGhGRq-QlA6lQoD9XLc9mLtgxowtCuupn3WDzevaWwTSIYk18SP0L9fetlEC7acSOiDepplbzgmdeKLSKGACx023gdO1JDfkFSMN_Jh1ySqVJ9DWjC39E6Lys4",
                'Content-Type'     => 'application/json'
            ],
            'json'=>[ "to" => "/topics/rital_users",
                'notification' => [
                    "title"=> $request->title,
                    "body"=> $request->message,
                    "sound"=> "default"
                ]
            ]]);
        $requestArray['title']=$request->title;
        $requestArray['body']=$request->message;
        $requestArray['user_id']=auth()->id();
        Notification::create($requestArray);
        return redirect()->route('notifications.index')->with('message', ' تم إرسال الرسالة بنجاح');

    }
    public function create(){
        return view('back-end.admin.notifications.create');
    }

    public function destroy($id)
    {
        Notification::FindOrFail($id)->delete();
        return redirect()->route('notifications.index');
    }
    public function usernotifications(){
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        $sql = "SELECT* FROM notifications WHERE user_id = '$user_id' OR '$user_role' = 'admin' ";
        $rows = DB::select($sql);
        return response()->json($rows);
    }

    public function deleteNotificationByUser()
    {
        $user_id = auth()->user()->id;
        $id = request('id');
        $notif = Notification::find($id);
        if ($notif->user_id == $user_id){
            $notif->delete();
        }
        return response()->json("deleted");
    }
}
