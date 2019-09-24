<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'phone' => 'required|numeric|unique:users|min:10',
                'password' => 'required|min:6',
                'repassword' => 'required|min:6',
                'gh_ten' => 'required',
                'email' => 'required|email|unique:users',
                'gh_dia_chi' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'phone.required' => 'Số điện thoại không được trống !',
                'phone.numeric' => 'Số điện thoại không được là chữ !',
                'phone.unique' => 'Số điện thoại đã có người sử dụng !',
                'phone.min' => 'Số điện thoại it nhất 10 số !',
                'password.required' => 'Mật khẩu không được trống !',
                'password.min' => 'Mật khẩu ít nhật 6 ký tự !',
                'repassword.required' => 'Nhập mật khẩu không được trống !',
                'repassword.min' => 'Nhập mật khẩu ít nhất 6 ký tự !',
                'gh_ten.required' => 'Tên gian hàng không được trống !',
                'email.required' => 'Email không được trống !',
                'email.email' => 'Email không đúng định dạng !',
                'email.unique' => 'Email đã có người sử dụng !',
                'gh_dia_chi.required' => 'Địa chỉ không được trống !',
            ];
    }
}
