<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        if(!$articles){
            abort(404,'No Article Found');
        }
        return view('pages.home', ['articles' => $articles]);

    }

    public function articleDetail($id)
    {
        $article = Article::findOrFail($id); 
        if(!$article){
            abort(404,'No article found with this id');
        }
        return view('pages.articledetail', ['article' => $article]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg',
            'postdate'    => 'required|date',
            'title'       => 'required|string',
            'content'     => 'required|string',
            'authorname'  => 'required|string',
            'authortitle' => 'required|string',
            'category'    => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        Article::create($data);

        return redirect('/')->with('success', "Article Created Successfully");
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

        return view('pages.articles.edit', ['article' => $article]);
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
            'content'     => 'sometimes|required|string',
            'authorname'  => 'sometimes|required|string',
            'authortitle' => 'sometimes|required|string',
            'category'    => 'sometimes|required|string',
        ]);
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $path               = $request->file('image')->store('public/images');
            $validated['image'] = $article;

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
