<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamAddRequest extends FormRequest
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
        return
            [
                'sp_ten' => 'required',
                'file' => 'required|image',
                'sp_thuong_hieu' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'sp_ten.required' => 'Tên sản phẩm không được trống !',
                'file.required' => 'Ảnh sản phẩm không được trống !',
                'file.image' => 'Không phải ảnh !',
                'sp_thuong_hieu.required' => 'Thương hiệu không được trống !',
            ];
    }
}
