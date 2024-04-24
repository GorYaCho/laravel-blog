<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'This field is required',
          'name.string' => 'This field is required to be string',
          'email.required' => 'This field is required',
          'email.string' => 'This field is required to be string',
          'email.email' => 'Your mail should be in type of user@mail.com',
          'email.unique' => 'User with such e-mail already exists',
        ];
    }
}
