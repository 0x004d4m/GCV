<?php

namespace App\Http\Requests\Admin\client;

use Illuminate\Foundation\Http\FormRequest;

use App\Http\Requests\Request;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|min:1|max:255|unique:client',
            'email' => 'required|email:rfc,dns|unique:client',
            'username' => 'required|min:1|max:255|unique:client',
            'password' => 'required|min:6|max:255',
            'name' => 'required|min:1|max:255'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
