<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaisan extends FormRequest
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
            'taisan' => 'required|max:255',
            'loaits' => 'required',
            'soluong' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'taisan.required' =>"Vui lòng nhập tên tài sản",
            'soluong.required' => "vui lòng nhập số lượng"
        ];
    }
}
