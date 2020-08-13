<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Http\Request;

class Contacts extends Controller
{
    public function index(){
        $rows = Contact::all();
        return view('back-end.admin.contacts.index',compact('rows'));
    }

    public function destroy($id)
    {
        Contact::FindOrFail($id)->delete();
        return redirect()->route('contacts.index');
    }


  public function contactus(Request $request)
    {
        $row = $request->all();
        $message=Contact::create($row);
        return response()->json(['message'=>$message]);
    }
}
