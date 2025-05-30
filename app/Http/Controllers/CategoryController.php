<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if (! $categories) {
            abort(404, 'No Category found');
        }

        return view('pages.category.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('pages.category.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category'=> 'required|string|unique:categories,category',
           
        ]);


        Category::create($data);

        return redirect('/category/create')->with('success', 'Category created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categoryWiseArticles=$category->articles;
        // dd($categoryWiseArticles);
      
         if (! $categoryWiseArticles) {
             abort(404, 'No Article found with this author');
         }
         return view('pages.category.categoryWiseArticles', [
            'categoryWiseArticles' => $categoryWiseArticles,
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'category'        => 'sometimes|required|string',
  
        ]);
     $category->update($data);
     return redirect('/')->with('success', 'Category created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/')->with('success', 'Category Deleted');
    }
}
