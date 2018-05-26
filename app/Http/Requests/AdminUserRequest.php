<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'phone' => 'unique:admins',
            'role_id' => 'numeric',
        ];
    }

    public function messages(){
        return [
            'phone.unique' => '此手机号已存在',
            'role_id.numeric' => '必须选择一个角色',
        ];
    }
}
