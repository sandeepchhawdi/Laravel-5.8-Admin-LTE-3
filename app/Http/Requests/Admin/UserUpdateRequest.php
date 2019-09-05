<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user_id = \Request::segments()[1];
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,id,'.$user_id,
            'password' => 'nullable|min:3|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:3',
            'roles' => 'required|array|min:1'
        ];
    }
}
