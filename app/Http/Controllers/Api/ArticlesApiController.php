<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Resources\ArticlesResours;
use App\Contracts\UserInterface;

class ArticlesApiController extends Controller
{
    public function index(Request $request)
    {

        $articles = Article::where('user_id', resolve(UserInterface::class)->user->id)->get();

        return ArticlesResours::collection($articles);
    }
}
