<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('amazon')->only(['store', 'update']);
    }
    
    public function index()
    {
        $categories = Category::paginate(5);
        return view("categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        $logo = $request->name . '.' . $request->logo->extension();
        $request->logo->move(public_path('images/categories'), $logo);

        $category->name = $request->name;
        $category->logo = $logo;
        $category->save();

        // Category::create($request->all());
        return to_route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("categories.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.update", ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // dd($request->logo);
        if ($request->logo) {
            unlink('images/categories/' . $category->logo);
            $logo = $request->name . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/categories'), $logo);
            $category->logo = $logo;
        }

        $category->name = $request->name;
        $category->save();
        return to_route("categories.show", $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->logo) {
            unlink('images/categories/' . $category->logo);
        }
        $category->delete();
        return to_route("categories.index");
    }
}
