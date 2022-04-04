<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class Chat extends Controller
{
    public function Chat(Request $req){
        $id = $req->id;
        return view('chat',[
            'uid' => $id
        ]);
    }
}