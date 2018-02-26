<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    // protected $availableIncludes = ['categories'];

    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'body' => $article->body,
            'categories' => $article->categories,
            'reply_count' => (int) $article->reply_count,
            'view_count' => (int) $article->view_count,
            'excerpt' => $article->excerpt,
            'created_at' => $article->created_at->toDateTimeString(),
            'updated_at' => $article->updated_at->toDateTimeString(),
        ];
    }

    // public function includeCategory(Article $article)
    // {
    //     return $this->item($article->category, new CategoryTransformer());
    // }
}
