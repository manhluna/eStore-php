<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhanCapHoaHongRequest extends FormRequest
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
                'so_cap' => 'required|numeric',
                'ti_le' => 'required|numeric',
            ];
    }

    public function messages()
    {
        return
            [
                'so_cap.required' => 'Số cấp không được trống !',
                'so_cap.numeric' => 'Số cấp phải là số !',
                'ti_le.required' => 'Tỉ lệ không được trống !',
                'ti_le.numeric' => 'Tỉ lệ phải là số !',
            ];
    }
}
