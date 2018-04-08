<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        if(isset($category->articles_count)) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'articles_count' => $category->articles_count
            ];
        } else {
            return [
                'id' => $category->id,
                'name' => $category->name
            ];
        }
    }
}
