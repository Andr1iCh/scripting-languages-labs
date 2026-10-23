<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'genre' => ['required', 'string', 'max:60'],
            'director' => ['required', 'string', 'max:100'],
            'release_year' => ['required', 'integer', 'min:1888', 'max:' . ((int) date('Y') + 5)],
            'duration' => ['required', 'integer', 'min:1', 'max:600'],
            'description' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле «:attribute» обов’язкове.',
            'string' => 'Поле «:attribute» має містити текст.',
            'integer' => 'Поле «:attribute» має бути цілим числом.',
            'title.max' => 'Назва має містити не більше 150 символів.',
            'genre.max' => 'Жанр має містити не більше 60 символів.',
            'director.max' => 'Ім’я режисера має містити не більше 100 символів.',
            'release_year.min' => 'Рік виходу має бути не раніше 1888.',
            'release_year.max' => 'Рік виходу не може перевищувати поточний рік більш ніж на 5 років.',
            'duration.min' => 'Тривалість має бути не менше 1 хвилини.',
            'duration.max' => 'Тривалість має бути не більше 600 хвилин.',
            'description.max' => 'Опис має містити не більше 5000 символів.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Назва',
            'genre' => 'Жанр',
            'director' => 'Режисер',
            'release_year' => 'Рік виходу',
            'duration' => 'Тривалість',
            'description' => 'Опис',
        ];
    }
}
