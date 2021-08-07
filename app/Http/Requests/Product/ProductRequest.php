<?php

namespace App\Http\Requests\Product;

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
            'name'=>'required',
            'file'=>'required|file',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'file.required' => 'Vui lòng chọn một hình ảnh',
            'file.file'=>'Ảnh không đúng định dạng',

        ];
    }
}
