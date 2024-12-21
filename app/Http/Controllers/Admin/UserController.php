<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user_info = Auth::user();
        return view('admin.user.create',compact('user_info'));
    }

    public function manage()

    {
        $users = User::all();
        
        return view('admin.user.manage', compact('users')); 
    }
}
