<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $subCategory = SubCategory::all();
        return view('backend.product.subCategory.subCategory',compact('subCategory','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->status = $request->has('status') ? 'active' : 'inactive';
        $subCategory->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subCategories = SubCategory::find($id);
        $subCategories->category_id = $request->category_id;
        $subCategories->name = $request->name;
        $subCategories->description = $request->description;
        $subCategories->status = $request->has('status') ? 'active' : 'inactive';
        $subCategories->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::findOrFail($id)->delete();
        return back();
    }
}
