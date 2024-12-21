<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMainController extends Controller
{

    public function welcome(){
        $user_info = Auth::user();
        return view('welcome' , compact($user_info));
    }
    public function index(){
        $user_info = Auth::user();
        return view('user.layouts.layout', compact('user_info'));
    }

    public function history(){
        $user_info = Auth::user();
        return view('user.history', compact('user_info'));
    }

    





    
}
