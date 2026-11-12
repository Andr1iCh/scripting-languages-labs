<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [
            ['Останній сигнал', 2024, 'The Last Signal', 'A space station crew receives an unusual signal from Earth.'],
            ['За межами орбіти', 2025, 'Beyond Orbit', 'A team of explorers sets out for an unknown planet.'],
            ['Місто майбутнього', 2023, 'City of Tomorrow', 'A young inventor tries to save his city.'],
            ['Портал часу', 2024, 'The Time Portal', 'A chance experiment opens a path to the past.'],
            ['Тиха планета', 2025, 'The Silent Planet', 'Astronauts discover traces of a civilization on a deserted planet.'],
            ['Шлях до зірок', 2022, 'The Path to the Stars', 'A group of friends prepares the first interstellar expedition.'],
            ['Дорога додому', 2024, 'The Road Home', 'Returning to his hometown changes a man’s plans.'],
        ];

        foreach ($translations as [$original, $year, $title, $description]) {
            $movie = Movie::where('title', $original)->where('release_year', $year)->firstOrFail();
            $movie->translations()->firstOrCreate(['lang' => 'en'], compact('title', 'description'));
        }
    }
}
