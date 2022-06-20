<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'Pasteles',
            'estado' => 1,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
            'orden' => 1,
            'descripcion_secundaria' => 'es una desadaiua dasecunaweda dadjh aoidua oiduh adiuhaw woidyg awd'
        ]);

        Category::create([
            'nombre' => 'Bebestibles',
            'estado' => 1,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
                'orden' => 10,
                'descripcion_secundaria' => 'es una desadaiua dasecunaweda dadjh aoidua oiduh adiuhaw woidyg awd'
        ]);

        Category::create([
            'nombre' => 'Tortas',
            'estado' => 1,
            'descripcion' =>
                'Rica mermelada de frutas sabor tamarindo pero digamos que es de pera',
                'orden' => 3
        ]);

        Category::create([
            'nombre' => 'EstadoCero',
            'estado' => 0,
            'descripcion' =>
                'Es un test pra verificar si se ve un producto con estado 0',
                'orden' => 7,
                'descripcion_secundaria' => 'es una desadaiua dasecunaweda dadjh aoidua oiduh adiuhaw woidyg awd'
        ]);
    }
}
