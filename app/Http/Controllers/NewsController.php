<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index(){
        $news_info = News::all();
        return view('admin.news.create_news', compact('news_info'));
    }


    public function showNew($id) {
        $news = News::findOrFail($id);
        return view('show', compact('news'));
    }

    public function manage()

    {
        $news = News::all();
        
        return view('admin.news.manage_news', compact('news')); 
    }
    public function store_news(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'publication_date' => 'required|date',
        ]);

        

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }
        $news = News::create([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->content ,
            'publication_date' => $request->publication_date,
        ]);

        

        return redirect()->back()->with('success','News Added Successfully');

    }

    public function showNews($id)
    {
        $news_info = News::find($id);
        return view('admin.news.edit_news',compact('news_info'));
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|max:100|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|min:6',
            'publication_date' => 'required|date',
        ]);
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image && Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }
    
        
        $news->update([
            'title' => $request->title,
            'content' => $request->content ? $request->content : $news->content,
            
            'publication_date' => $request->publication_date,
        ]);
        
        return redirect()->back()->with('success', 'News Updated Successfully');
    }



    public function deleteNews($id){
        News::findOrFail($id)->delete();
        return redirect()->back()->with('success','News Deleted Successfully');
    }
}
