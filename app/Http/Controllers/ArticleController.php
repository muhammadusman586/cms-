<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $articles = Article::with('Author', 'Category')
                       ->orderBy('created_at', 'desc')
                       ->paginate(5);

    // if ($articles->isEmpty()) {
    //     abort(404, 'No Article Found');
    // }

    return view('pages.home', ['articles' => $articles]);
}

   

    public function articleDetail($id)
    {
        //  dd($id);
        $article = Article::with('author','category')->findOrFail($id); 
        if(!$article){
            abort(404,'No article found with this id');
        }
        return view('pages.articles.articledetail', ['article' => $article]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors=Author::all();
        $categories=Category::all();
        return view('pages.articles.create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request);
        $data = $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'postdate'    => 'required|date',
            'title'       => 'required|string',
            'content'     => 'required|string',
            'author_id'   => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
        ]);
        // dd($data);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        Article::create($data);
    
        return redirect('/')->with('success', 'Article created successfully.');
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
    public function edit(Article $article)
    {

        $authors=Author::all();
        $categories=Category::all();
        return view('pages.articles.edit', [
            'article' => $article,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // $article   = Article::findOrFail($id);
        $validated = $request->validate([
            'image'       => 'sometimes|nullable|image|mimes:png,jpg',
            'postdate'    => 'sometimes|required|date',
            'title'       => 'sometimes|required|string',
            'author_id'    => 'sometimes|required|exists:authors,id',
            'category_id'    => 'sometimes|required|exists:categories,id',
            
            
        ]);
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $path=$request->file('image')->store('images', 'public');
            $validated['image'] = $path;

        }

        $article->update($validated);
        return redirect('/')->with('success', 'Article updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        $article->delete();
        return redirect('/author')->with('success', 'Article Deleted');
    }
}
