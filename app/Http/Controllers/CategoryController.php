<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->id = $request->category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image->store('category');
        // image will be stored in storage--app--public folder
        $category->save();
        return redirect()->back()->with('message','Category Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if($category->status==1)
        {
            $category->update(['status'=>0]);

        }else
        {
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Satus Changed Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('category');
        }

        $category->save();
        return redirect('/categories')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category)
    {
        $delete = $category->delete();
        if($delete)
        {
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        }
    }
}
