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

