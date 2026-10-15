<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'phone' => ['required', 'string', 'regex:/\A\+380[0-9]{9}\z/'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введіть ваше ім’я.',
            'name.string' => 'Ім’я має бути текстом.',
            'name.max' => 'Ім’я не може містити більше 255 символів.',
            'email.required' => 'Введіть вашу електронну адресу.',
            'email.string' => 'Електронна адреса має бути текстом.',
            'email.email' => 'Введіть коректну електронну адресу.',
            'email.max' => 'Електронна адреса не може містити більше 255 символів.',
            'message.required' => 'Напишіть повідомлення.',
            'message.string' => 'Повідомлення має бути текстом.',
            'message.min' => 'Повідомлення має містити щонайменше 10 символів.',
            'message.max' => 'Повідомлення не може містити більше 5000 символів.',
            'phone.required' => 'Введіть номер телефону.',
            'phone.string' => 'Номер телефону має бути текстом.',
            'phone.regex' => 'Введіть номер у форматі +380XXXXXXXXX без пробілів.',
        ];
    }
}
