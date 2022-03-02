<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLoaiSanPhamRequest extends FormRequest
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
            'ten_loai' => 'required',
        ];
    }
    public function messages()
    {

        return [
            'ten_loai.required' => 'Vui lòng không bỏ trống mục này !',
        ];

    }
}
