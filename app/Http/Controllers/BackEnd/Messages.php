<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class Messages extends Controller
{
    public function index(){
        $rows = Message::all();
        return view('back-end.admin.messages.index',compact('rows'));
    }

    public function destroy($id)
    {
        Message::FindOrFail($id)->delete();
        return redirect()->route('messages.index');
    }

    public function store(Request $request)
    {
        $row = $request->all();
        $row['user_id'] = auth()->user()->id;
        $rate=Message::create($row);
        return response()->json($rate);
    }
}
