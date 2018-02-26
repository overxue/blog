<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
use App\Http\Requests\Api\CategoryRequest;
use App\Transformers\ArticleTransformer;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
        $categories = $category->getAllCached();
        return $this->response->collection($categories, new CategoryTransformer());
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return $this->response->item($category, new CategoryTransformer())->setStatusCode(201);
        // return $this->response->created();
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return $this->response->item($category, new CategoryTransformer());
    }

    public function destory(Category $category)
    {
        $category->delete();
        return $this->response->noContent();
    }

    public function article(Category $category, $id)
    {
        $categories = $category->find($id)->articles;
        return $this->response->collection($categories, new ArticleTransformer());
    }
}
