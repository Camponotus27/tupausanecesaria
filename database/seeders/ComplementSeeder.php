<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complement;

class ComplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complement::create([
            'nombre' => 'Mermelada',
            'stock' => 10,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
        ]);

        Complement::create([
            'nombre' => 'Frutilla',
            'stock' => 30,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
        ]);

        Complement::create([
            'nombre' => 'Mora',
            'stock' => 3,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
        ]);

        Complement::create([
            'nombre' => 'Canela',
            'stock' => 5,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
        ]);

        Complement::create([
            'nombre' => 'Palta',
            'stock' => 50,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
        ]);
    }
}
