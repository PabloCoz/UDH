<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Basico',
        ]);

        Level::create([
            'name' => 'Intermedio',
        ]);

        Level::create([
            'name' => 'Avanzado',
        ]);

        Level::create([
            'name' => 'Pro',
        ]);
    }
}
