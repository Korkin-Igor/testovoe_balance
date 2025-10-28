<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_user_id' => "required|integer",
            'to_user_id' => "required|integer|different:from_user_id",
            'amount' => "required|numeric|min:1|max:999999999999",
            'comment' => "nullable|string|max:255",
        ];
    }

    public function messages(): array
    {
        return [
            'from_user_id.required' => 'Поле "ID отправителя" обязательно для заполнения.',
            'from_user_id.integer' => 'ID отправителя должен быть целым числом.',
            'from_user_id.exists' => 'Пользователь-отправитель с указанным ID не найден.',

            'to_user_id.required' => 'Поле "ID получателя" обязательно для заполнения.',
            'to_user_id.integer' => 'ID получателя должен быть целым числом.',
            'to_user_id.exists' => 'Пользователь-получатель с указанным ID не найден.',
            'to_user_id.different' => 'Отправитель и получатель не могут быть одним и тем же пользователем.',

            'amount.required' => 'Поле "Сумма" обязательно для заполнения.',
            'amount.numeric' => 'Сумма должна быть числом.',
            'amount.min' => 'Сумма должна быть не меньше 1.',
            'amount.max' => 'Сумма не может превышать 999 999 999 999.',

            'comment.nullable' => 'Комментарий должен быть строкой или отсутствовать.',
            'comment.string' => 'Комментарий должен быть текстом.',
            'comment.max' => 'Комментарий не должен превышать 255 символов.',
        ];
    }
}
