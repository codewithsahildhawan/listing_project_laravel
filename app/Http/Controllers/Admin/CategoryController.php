<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display the list of categories
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('backend.category.create');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'nullable|string|max:255',
            'long_desc' => 'nullable|string',
            'image' => 'nullable|string', // You can handle file upload separately
            'parent_id' => 'nullable|integer',
            'order_by' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_short_desc' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'nullable|string|max:255',
            'long_desc' => 'nullable|string',
            'image' => 'nullable|string', // Handle file upload separately
            'parent_id' => 'nullable|integer',
            'order_by' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_short_desc' => 'nullable|string|max:255',
            'meta_desc' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
