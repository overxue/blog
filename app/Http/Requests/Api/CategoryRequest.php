<?php

namespace App\Http\Requests\Api;

class CategoryRequest extends FormRequest
{
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|unique:categories,name'
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string|unique:categories,name'
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'name' => '标题'
        ];
    }
}

