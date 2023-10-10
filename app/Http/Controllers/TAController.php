<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TAController extends Controller
{
    public function TA(){
        return view("Home_TA");
    }

    public function name(){
        $users = Auth::user()->name;
        return view('Home_TA', ['users' => $users]);
    }

    public function TAadd(){
        return view("TAaddsc");
    }

    public function TAview(){
        return view("TAview");
    }

}
