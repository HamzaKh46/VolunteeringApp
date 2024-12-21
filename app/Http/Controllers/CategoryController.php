<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $category_info = Category::all();
        return view('admin.categories.createCat', compact('category_info'));
    }


    
    // public function showCategory($id) {
    //     $news = Category::findOrFail($id);
    //     return view('show', compact('news'));
    // }

    public function manage()

    {
        $categories = Category::all();
        
        return view('admin.categories.manageCat', compact('categories')); 
    }
    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|min:3',
            
        ]);

        
        $category = Category::create([
            'name' => $request->name,
            
        ]);


        return redirect()->back()->with('success','Category Added Successfully');

    }

    public function showCategory($id)
    {
        $category_info = Category::find($id);
        return view('admin.categories.editCat',compact('category_info'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100|min:3',
            
        ]);
    

        
        $category->update([
            'name' => $request->name,
            
        ]);
        
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }



    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
