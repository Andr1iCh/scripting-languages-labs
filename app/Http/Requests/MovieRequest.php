<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $date = $this->input('release_date');
        $releaseYear = $this->route('movie')?->release_year;

        if (is_string($date) && preg_match('/^(\d{4})-\d{2}-\d{2}$/D', $date, $parts)) {
            $releaseYear = (int) $parts[1];
        }

        $this->merge(['release_year' => $releaseYear]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $movie = $this->route('movie');
        $datePresence = $movie === null || $movie->release_date !== null ? 'required' : 'nullable';

        return [
            'title' => ['required', 'string', 'max:150'],
            'genre' => ['required', 'string', 'max:60'],
            'actors' => ['sometimes', 'array'],
            'actors.*' => ['integer', 'distinct', 'exists:actors,id'],
            'director' => ['required', 'string', 'max:100'],
            'release_year' => ['nullable', 'integer'],
            'release_date' => [
                $datePresence,
                'date_format:Y-m-d',
                'after_or_equal:1888-01-01',
                'before_or_equal:' . (today()->year + 5) . '-12-31',
            ],
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
            'release_date.after_or_equal' => 'Дата виходу має бути не раніше 1888 року.',
            'release_date.before_or_equal' => 'Рік виходу не може перевищувати поточний рік більш ніж на 5 років.',
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
            'release_date' => 'Дата виходу',
            'duration' => 'Тривалість',
            'description' => 'Опис',
        ];
    }
}
