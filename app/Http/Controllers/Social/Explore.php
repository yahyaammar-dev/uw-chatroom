<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class Explore extends Controller
{
    public function Explore(){
        $allUser = User::all();
        return view('explore',[
            'users' => $allUser
        ]);
    }
}