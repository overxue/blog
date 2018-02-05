<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'category_id', 'reply_count', 'view_count', 'excerpt'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
