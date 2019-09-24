<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoDiaChiRequest extends FormRequest
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
                'ten_kh' => 'required',
                'sdt_kh' => 'required|numeric',
                'dia_chi' => 'required',
                'tinhthanh' => 'required',
                'quanhuyen' => 'required',
                'phuongxa' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'ten_kh.required' => 'Tên không được trống !',
                'sdt_kh.required' => 'Số điện thoại không được trống !',
                'sdt_kh.numeric' => 'Số điện thoại phải là số !',
                'dia_chi.required' => 'Đại chỉ không được trống !',
                'tinhthanh.required' => 'Tỉnh/Thành phố không được trống !',
                'quanhuyen.required' => 'Quận/Huyện không được trống !',
                'phuongxa.required' => 'Phường/Xã không được trống !',

            ];
    }
}
