<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'nombre' => 'Producto 1',
            'descripcion' => 'Es una descripcion',
            'stock' => 20,
            'precio' => 990,
            'id_category' => 1,
            'estado' => 1,
        ]);

        Product::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Es una descripcion',
            'stock' => 20,
            'precio' => 1990,
            'id_category' => 1,
            'estado' => 1,
        ]);

        Product::create([
            'nombre' => 'Producto 3',
            'descripcion' => 'Es una descripcion',
            'stock' => 20,
            'precio' => 2321,
            'id_category' => 1,
            'estado' => 1,
        ]);

        Product::create([
            'nombre' => 'Producto 4',
            'descripcion' => 'Es una descripcion',
            'stock' => 20,
            'precio' => 131313,
            'id_category' => 1,
            'estado' => 1,
        ]);

        Product::factory(100)->create();
    }
}
