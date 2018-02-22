<?php

namespace App\Observers;

use App\Models\Category;
use Cache;

class CategoryObserver
{
    // 在保存时清空 cache_key 对应的缓存
    public function saved(Category $category)
    {
        Cache::forget($category->cache_key);
    }
}
