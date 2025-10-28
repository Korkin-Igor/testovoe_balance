<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => 'required|string|max:11|exists:users,phone',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Поле "Номер телефона" обязательно для заполнения.',
            'phone.string'   => 'Номер телефона должен быть строкой.',
            'phone.max'      => 'Номер телефона не должен превышать 11 символов.',
            'phone.exists'   => 'Пользователь с таким номером телефона не найден.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string'   => 'Пароль должен быть строкой.',
            'password.min'      => 'Пароль должен содержать не менее 6 символов.',
        ];
    }
}
