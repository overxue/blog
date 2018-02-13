<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function created(Article $article)
    {
        $article->category->increment('post_count');
    }

    public function deleted(Article $article)
    {
        $article->category->decrement('post_count');
    }
}
