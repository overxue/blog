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
        switch($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|string',
                    'body' => 'required|string',
                    'category_id' => 'required|exists:categories,id',
                    'excerpt' => 'required|string'
                ];
                break;
            case 'PATCH':
                return [
                    'title' => 'string',
                    'body' => 'string',
                    'category_id' => 'exists:categories,id',
                    'excerpt' => 'string'
                ];
                break;
        }
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
