<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Transformers\ArticleTransformer;

class ArticlesController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $query = $article->query();
        if ($categoryId = $request->category_id) {
            $query->where('category_id', $categoryId);
        }
        $articles = $query->recent()->get();
        return $this->response->collection($articles, new ArticleTransformer());
    }
}
