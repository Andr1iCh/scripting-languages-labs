<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Кілліан Мерфі',
            'Емілі Блант',
            'Метт Деймон',
            'Роберт Дауні-молодший',
            'Флоренс П’ю',
        ];

        foreach ($names as $name) {
            Actor::firstOrCreate(['name' => $name]);
        }
    }
}
