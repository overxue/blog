<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '标题'
        ];
    }
}

