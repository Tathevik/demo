<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public	function index()
    {
    	$articles = Article::latest()->get();

    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);
        $article->categories()->attach($request->categories);

        return redirect('/articles');
    }

    public function show(Article $article)
    {
        $categories = $article->categories;

        $comments = $article->comments;

        return view('articles.show', compact('article', 'categories', 'comments'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {    
        $article->update($request->only(['title', 'body']));
        $article->categories()->sync($request->categories);

        return redirect('/articles');
    }

	public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles');
    }

}
