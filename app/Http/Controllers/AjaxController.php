<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public	function index(Request $request)
    {
        $articles = new Article();
        $sort = $request->sort ?? 'asc';

        if($request->has('column_name')){

            $columnName = $request->column_name;
            $articles = $articles->orderBy($columnName, $sort);
            $articles = $articles->paginate(5);
            return view('articles.table', compact('articles', 'sort'));
        }

        $articles = $articles->paginate(5);


        return view('articles.index', compact('articles', 'sort'));
    }
}
