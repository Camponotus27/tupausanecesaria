<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sebastian Cornejo',
            'email' => 'seba@seba.cl',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()
            ->count(7)
            ->create();
    }
}
