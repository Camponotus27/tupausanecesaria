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
        //Permission::create(['name' => 'order_day.index']);
        //Opciones
        Permission::create(['name' => 'opciones.index']);

        //user
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.destroy']);

        //roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.update']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.store']);
        Permission::create(['name' => 'roles.destroy']);

        //Categorias
        Permission::create(['name' => 'warehouse.category.index']);
        Permission::create(['name' => 'warehouse.category.show']);
        Permission::create(['name' => 'warehouse.category.edit']);
        Permission::create(['name' => 'warehouse.category.update']);
        Permission::create(['name' => 'warehouse.category.create']);
        Permission::create(['name' => 'warehouse.category.store']);
        Permission::create(['name' => 'warehouse.category.destroy']);

        //Productos
        Permission::create(['name' => 'warehouse.product.index']);
        Permission::create(['name' => 'warehouse.product.show']);
        Permission::create(['name' => 'warehouse.product.edit']);
        Permission::create(['name' => 'warehouse.product.update']);
        Permission::create(['name' => 'warehouse.product.create']);
        Permission::create(['name' => 'warehouse.product.store']);
        Permission::create(['name' => 'warehouse.product.destroy']);

        //Comelementos
        Permission::create(['name' => 'warehouse.complement.index']);
        Permission::create(['name' => 'warehouse.complement.show']);
        Permission::create(['name' => 'warehouse.complement.edit']);
        Permission::create(['name' => 'warehouse.complement.update']);
        Permission::create(['name' => 'warehouse.complement.create']);
        Permission::create(['name' => 'warehouse.complement.store']);
        Permission::create(['name' => 'warehouse.complement.destroy']);

        //Ordenes
        //Permission::create(['name' => 'orders.index']);
        Permission::create(['name' => 'orders.show']);
        Permission::create(['name' => 'orders.edit']);
        Permission::create(['name' => 'orders.create']);
        Permission::create(['name' => 'orders.destroy']);
        Permission::create(['name' => 'ordersDay.index']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        //$guest->givePermissionTo(['products.index', 'products.show']);

        //User Admin
        $user = User::find(1); //Sebastian Cornejo
        $user->assignRole('Admin');

        $user = User::find(2); //Sebastian Cornejo
        $user->assignRole('Admin');
    }
}
