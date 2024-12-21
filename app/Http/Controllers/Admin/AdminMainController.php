<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index(){
        $user_info = Auth::user();
        return view('admin.admin', compact('user_info'));
    }

    public function setting(){
        return view('admin.settings');
    }
    public function manage_user(){
        return view('admin.manage.user');
    }
    public function manage_stores(){
        return view('admin.manage.store');
    }
   

}
