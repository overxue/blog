<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Transformers\ArticleTransformer;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return $this->response->collection($articles, new ArticleTransformer());
    }
}
