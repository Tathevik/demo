<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   public function index()
   	{
   		$categories = Category::all();

   		return view('categories.index', compact('categories'));
   	}

   	public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        return redirect('/categories');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {    
        $category->update($request->only(['name']));

        return redirect('/categories');
    }

	public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }

    public function categoryArticles(Category $category)
    {
        $categoriesArticles = $category->articles;
        
        return view('categories.articles', compact('categoriesArticles'));
    }

}
