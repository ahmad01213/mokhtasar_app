<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use Illuminate\Http\Request;

class Bids extends Controller
{
    public function index()
    {
        $rows = Bid::all();
        return view('back-end.admin.users.index', compact('rows'));
    }
}
