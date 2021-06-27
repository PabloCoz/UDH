<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Pablo',
            'lastname' => 'Coz Ramos',
            'code' => '2016100300',
            'email' => '2016100300@udh.edu.pe',
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole('Admin');

        User::factory(50)->create();
    }
}
