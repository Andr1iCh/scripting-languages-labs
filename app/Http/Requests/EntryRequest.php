<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Ім\'я» не може бути
            порожнім.',
            'email.required' => 'Поле «Email» не може бути
            порожнім.',
            'email.email' => 'Email введено некоректно.',
        ];
    }

}

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
        ];
    }
}


