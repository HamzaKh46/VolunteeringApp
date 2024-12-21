<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->get(); // Load FAQs with their categories
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.faqs.create', compact('categories'));
    }

    public function showFaq()
    {
        $categories = Category::with('faqs')->get();
    
        return view('faq', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
