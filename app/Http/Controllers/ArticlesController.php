<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\User;

class ArticlesController extends Controller
{
    public	function index(Request $request)
    {
    	$articles = Article::latest()->filter($request)->get();

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
        $this->authorize('rule', $article);

        $categories = $article->categories;

        $comments = $article->comments;

        return view('articles.show', compact('article', 'categories', 'comments'));
    }

    public function edit(Article $article)
    {

        $this->authorize('rule', $article);

        $categories = Category::all();
        
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {    
        $this->authorize('rule', $article);

        $article->update($request->only(['title', 'body']));
        $article->categories()->sync($request->categories);

        return redirect('/articles');
    }

	public function destroy(Article $article)
    {
        $this->authorize('rule', $article);

        $article->comments()->delete();
        $article->categories()->detach();
        $article->delete();

        return redirect('/articles');
    }

}
