<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use App\Models\User;

class WelcomePageController extends Controller
{
    public function index()
    {   $news_info = News::all();

        return view("welcome", compact('news_info'));
    }

    public function showUsers()
    {   $users = User::all();
        return view("showUsers", compact('users'));
    }



    // public function index()
    // {   
    //     return view("welcome");
    // }

    // public function displayNews(){
    //     $news_info = News::all();
    //     // dd($news_info);
    //     return view('welcome', compact('news_info'));

    // }
}
