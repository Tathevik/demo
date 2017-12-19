<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public	function index()
    {
    	$articles = $articles = Article::all();

    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = Article::create($request->only(['title', 'body']));

        return redirect('/articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {    
        $article->update($request->only(['title', 'body']));

        return redirect('/articles');
    }

	public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles');
    }

}
