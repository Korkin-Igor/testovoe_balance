<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWithdrawRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "user_id" => "required|integer|exists:users,id",
            "amount" => "required|numeric|min:1|max:999999999999",
            "comment" => "nullable|string|max:255",
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Поле "ID пользователя" обязательно для заполнения.',
            'user_id.integer' => 'ID пользователя должен быть целым числом.',
            'user_id.exists' => 'Пользователь с указанным ID не найден.',

            'amount.required' => 'Поле "Сумма" обязательно для заполнения.',
            'amount.numeric' => 'Сумма должна быть числом.',
            'amount.min' => 'Сумма должна быть не меньше 1.',
            'amount.max' => 'Сумма не может превышать 999 999 999 999.',

            'comment.string' => 'Комментарий должен быть текстом.',
            'comment.max' => 'Комментарий не должен превышать 255 символов.',
        ];
    }
}
