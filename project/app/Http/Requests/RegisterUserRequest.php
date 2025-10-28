<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users,phone',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.string'   => 'Имя должно быть строкой.',
            'name.max'      => 'Имя не должно превышать 255 символов.',

            'phone.required' => 'Поле "Номер телефона" обязательно для заполнения.',
            'phone.string'   => 'Номер телефона должен быть строкой.',
            'phone.max'      => 'Номер телефона не должен превышать 11 символов.',
            'phone.unique'   => 'Пользователь с таким номером телефона уже есть.',

            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string'   => 'Пароль должен быть строкой.',
            'password.min'      => 'Пароль должен содержать не менее 6 символов.',
        ];
    }
}
