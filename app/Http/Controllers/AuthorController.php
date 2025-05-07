<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $authors = Author::select('name')->distinct()->pluck('name');
        $authors=Author::all();
        if (! $authors) {
            abort(404, 'No author found');
        }

        return view('pages.author.author', ['authors' => $authors]);
    }

    
   
    public function create()
    {
        $authors=Author::all();
        return view('pages.author.create',['authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'authortitle' => 'required|string',
            'authorimage' => 'nullable|image|mimes:jpg,png',
        ]);

        if ($request->hasFile('authorimage')) {
           
            $data['authorimage'] = $request->file('authorimage')->store('images','public');
        }

        Author::create($data);

        return redirect('/')->with('success', 'Author created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $authorArticles = $author->articles;
        // dd($authorArticles);
        if (! $authorArticles) {
            abort(404, 'No Article found with this author');
        }
        return view('pages.author.authorarticle', [
            'authorArticles' => $authorArticles,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('pages.author.edit',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|required|string',
            'authortitle' => 'sometimes|required|string',
            'authorimage' => 'sometimes|nullable|image|mimes:jpg,png',
        ]);

        if ($request->hasFile('authorimage')) {
            if ($author->authorimage) {
           Storage::delete($author->authorimage);
            }
            $path= $request->file('authorimage')->store('images','public');;
            $validated['authorimage'] = $path;
        }

        $author->update($validated);

        return redirect('/')->with('success', 'Author created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect('/')->with('success', 'Article Deleted');
    }
}
