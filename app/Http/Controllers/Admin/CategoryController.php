<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $page_name = "Categories";
        $categories = Category::latest()->get();
        return view('admin.category.list', compact('page_name', 'categories'));
    }

    public function create()
    {
        $page_name = 'Create Page';
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Name field is required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->status = 1;
        $category->save();

        return redirect(route('admin.category.list'))->with('success', 'Categories Created Successfully');
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status === 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $category->save();

        return redirect(route('admin.category.list'))->with('success', 'Categories status Successfully changed');
    }

    public function edit($id)
    {
        $page_name = "Edit Category";
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('page_name', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Name field is required'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->status = 1;
        $category->update();

        return redirect(route('admin.category.list'))->with('success', 'Categories updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
