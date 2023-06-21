<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:2',
            'count' => 'required|numeric|min:0',
        ];

        if ($this->route()->named('products.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }
        return $rules;

    }

    public function message()
    {
        return [
            'required' => 'Поле :attribute
            обязательно для ввода',
            'min' => 'Поле :attribute должно содержать минимум . символов',
            'max' => 'Поле :attribute должно содержать максимум . символов',
        ];
    }
}
