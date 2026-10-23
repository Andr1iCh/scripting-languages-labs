<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Останній сигнал',
                'genre' => 'Фантастика',
                'director' => 'Олена Марченко',
                'release_year' => 2024,
                'duration' => 116,
                'description' => 'Екіпаж космічної станції отримує незвичайний сигнал із Землі.',
            ],
            [
                'title' => 'За межами орбіти',
                'genre' => 'Фантастика',
                'director' => 'Андрій Коваль',
                'release_year' => 2025,
                'duration' => 124,
                'description' => 'Дослідники вирушають до невідомої планети.',
            ],
            [
                'title' => 'Місто майбутнього',
                'genre' => 'Фантастика',
                'director' => 'Ірина Бондар',
                'release_year' => 2023,
                'duration' => 108,
                'description' => 'Молодий винахідник намагається врятувати своє місто.',
            ],
            [
                'title' => 'Портал часу',
                'genre' => 'Фантастика',
                'director' => 'Максим Лисенко',
                'release_year' => 2024,
                'duration' => 112,
                'description' => 'Випадковий експеримент відкриває шлях у минуле.',
            ],
            [
                'title' => 'Тиха планета',
                'genre' => 'Фантастика',
                'director' => 'Олена Марченко',
                'release_year' => 2025,
                'duration' => 118,
                'description' => 'На безлюдній планеті астронавти знаходять сліди цивілізації.',
            ],
            [
                'title' => 'Шлях до зірок',
                'genre' => 'Фантастика',
                'director' => 'Андрій Коваль',
                'release_year' => 2022,
                'duration' => 130,
                'description' => 'Команда друзів готує першу міжзоряну експедицію.',
            ],
            [
                'title' => 'Дорога додому',
                'genre' => 'Драма',
                'director' => 'Наталія Мельник',
                'release_year' => 2024,
                'duration' => 101,
                'description' => 'Повернення до рідного міста змінює плани головного героя.',
            ],
            [
                'title' => 'Листи з осені',
                'genre' => 'Драма',
                'director' => 'Павло Савченко',
                'release_year' => 2023,
                'duration' => 96,
                'description' => 'Старі листи допомагають родині відновити втрачені зв’язки.',
            ],
            [
                'title' => 'Новий початок',
                'genre' => 'Драма',
                'director' => 'Ірина Бондар',
                'release_year' => 2025,
                'duration' => 105,
                'description' => 'Музикант переїжджає до іншого міста, щоб здійснити свою мрію.',
            ],
            [
                'title' => 'Вихідні без плану',
                'genre' => 'Комедія',
                'director' => 'Дмитро Шевченко',
                'release_year' => 2024,
                'duration' => 92,
                'description' => 'Звичайна поїздка друзів перетворюється на низку кумедних пригод.',
            ],
            [
                'title' => 'Сусіди зверху',
                'genre' => 'Комедія',
                'director' => 'Катерина Романюк',
                'release_year' => 2025,
                'duration' => 88,
                'description' => 'Нові сусіди змінюють спокійне життя мешканців будинку.',
            ],
            [
                'title' => 'Квиток на удачу',
                'genre' => 'Комедія',
                'director' => 'Дмитро Шевченко',
                'release_year' => 2023,
                'duration' => 99,
                'description' => 'Загублений квиток стає початком несподіваного знайомства.',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::firstOrCreate([
                'title' => $movie['title'],
                'release_year' => $movie['release_year'],
            ], $movie);
        }
    }
}
