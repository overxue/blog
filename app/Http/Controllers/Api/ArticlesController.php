<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Api\ArticleRequest;
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
        $articles = $query->recent()->paginate(10);
        return $this->response->paginator($articles, new ArticleTransformer());
    }

    public function show(Article $article)
    {
        $article->increment('view_count');
        return $this->response->item($article, new ArticleTransformer);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();
        return $this->response->item($article, new ArticleTransformer())->setStatusCode(201);
    }

    public function destory(Article $article)
    {
        $article->delete();
        return $this->response->noContent();
    }
}
