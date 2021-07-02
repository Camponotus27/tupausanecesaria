<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'products.index']);
        //Opciones
        Permission::create(['name' => 'opciones.index']);

        //user
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.destroy']);

        //roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.destroy']);

        //Categorias
        Permission::create(['name' => 'warehouse.category.index']);
        Permission::create(['name' => 'warehouse.category.show']);
        Permission::create(['name' => 'warehouse.category.edit']);
        Permission::create(['name' => 'warehouse.category.create']);
        Permission::create(['name' => 'warehouse.category.store']);
        Permission::create(['name' => 'warehouse.category.destroy']);

        //Articulos
        Permission::create(['name' => 'warehouse.product.index']);
        Permission::create(['name' => 'warehouse.product.show']);
        Permission::create(['name' => 'warehouse.product.edit']);
        Permission::create(['name' => 'warehouse.product.create']);
        Permission::create(['name' => 'warehouse.product.store']);
        Permission::create(['name' => 'warehouse.product.destroy']);

        //Ordenes
        Permission::create(['name' => 'orders.index']);
        Permission::create(['name' => 'orders.show']);
        Permission::create(['name' => 'orders.edit']);
        Permission::create(['name' => 'orders.create']);
        Permission::create(['name' => 'orders.destroy']);
        Permission::create(['name' => 'ordersDay.index']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'products.index',
            'opciones.index',
            'users.index',
            'users.show',
            'users.edit',
            'users.destroy',
            'roles.index',
            'roles.show',
            'roles.edit',
            'roles.create',
            'roles.destroy',
            'warehouse.category.index',
            'warehouse.category.show',
            'warehouse.category.edit',
            'warehouse.category.create',
            'warehouse.category.store',
            'warehouse.category.destroy',
            'warehouse.product.index',
            'warehouse.product.show',
            'warehouse.product.edit',
            'warehouse.product.create',
            'warehouse.product.store',
            'warehouse.product.destroy',
            'orders.index',
            'orders.show',
            'orders.edit',
            'orders.create',
            'orders.destroy',
            'ordersDay.index',
        ]);

        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        //$guest->givePermissionTo(['products.index', 'products.show']);

        //User Admin
        $user = User::find(1); //Sebastian Cornejo
        $user->assignRole('Admin');
    }
}
