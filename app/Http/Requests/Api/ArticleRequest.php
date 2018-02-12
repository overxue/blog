<?php

namespace App\Http\Requests\Api;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'body' => '文章内容',
            'category_id' => '文章分类',
            'excerpt' => '文章摘要'
        ];
    }
}
