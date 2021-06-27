<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'value' => 0,
        ]);

        Price::create([
            'name' => 'US$ 9.99',
            'value' => 9.99,
        ]);

        Price::create([
            'name' => 'US$ 49.99',
            'value' => 49.99,
        ]);

        Price::create([
            'name' => 'US$ 99.99',
            'value' => 99.99,
        ]);

        Price::create([
            'name' => 'US$ 139.99',
            'value' => 139.99,
        ]);
    }
}
