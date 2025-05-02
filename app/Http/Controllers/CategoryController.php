<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Article::select('category')->distinct()->pluck('category');
        if(!$categories){
            abort(404,'No Category Found');
        }
        return view('pages.category',['categories'=>$categories]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        
        $categoryArticles=Article::where('category',$category)->get();
        // dd($categoryArticles);
        
        if(!$categoryArticles){
            abort(404,'Not Found with this category Article');
        }
        return view('pages.filtercategory',['categoryArticles'=>$categoryArticles,'category'=>$category]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
