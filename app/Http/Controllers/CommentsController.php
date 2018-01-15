<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $article->addComment([
            'body' => $request->body,
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
