<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('menu.main');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::resource('in_shopping_carts', 'InShoppingCartsController', [
    'only' => ['store', 'destroy'],
]);
Route::resource('compras', 'ShoppingCartsController', [
    'only' => ['show'],
]);
Route::resources([
    'complements' => App\Http\Controllers\ComplementController::class,
]);

Route::get('/carrito', 'ShoppingCartsController@index');

Route::post('/carrito', 'ShoppingCartsController@checkout');
Route::get('/payments/store', 'PaymentsController@store');

Route::get('menu', [App\Http\Controllers\MenuController::class, 'index'])->name(
    'menu.index'
);

Route::get('contactanos', [
    App\Http\Controllers\NavigateController::class,
    'contactUs',
])->name('navigate.contact-us');

// Vincular Storage
Route::get('/create-symlink', function () {
    symlink(storage_path('/app/public'), public_path('storage'));
    echo "Symlink Created. Thanks";
});

//Permisos y roles

Route::middleware(['auth'])->group(function () {
    //Roles
    Route::get('roles/create', [
        App\Http\Controllers\RoleController::class,
        'create',
    ])
        ->name('roles.create')
        ->middleware('permission:roles.create');

    Route::post('roles', [App\Http\Controllers\RoleController::class, 'store'])
        ->name('roles.store')
        ->middleware('permission:roles.store');

    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])
        ->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/{role}', [
        App\Http\Controllers\RoleController::class,
        'show',
    ])
        ->name('roles.show')
        ->middleware('permission:roles.show');

    Route::get('roles/{role}/edit', [
        App\Http\Controllers\RoleController::class,
        'edit',
    ])
        ->name('roles.edit')
        ->middleware('permission:roles.edit');

    Route::put('roles/{role}', [
        App\Http\Controllers\RoleController::class,
        'update',
    ])
        ->name('roles.update')
        ->middleware('permission:roles.update');

    Route::delete('roles/{role}', [
        App\Http\Controllers\RoleController::class,
        'destroy',
    ])
        ->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    //Product
    Route::get('warehouse/product/create', [
        App\Http\Controllers\ProductController::class,
        'create',
    ])
        ->name('products.create')
        ->middleware('permission:warehouse.product.create');

    Route::post('warehouse/product', [
        App\Http\Controllers\ProductController::class,
        'store',
    ])
        ->name('products.store')
        ->middleware('permission:warehouse.product.store');

    Route::get('warehouse/product', [
        App\Http\Controllers\ProductController::class,
        'index',
    ])
        ->name('products.index')
        ->middleware('permission:warehouse.product.index');

    Route::get('warehouse/product/{product}', [
        App\Http\Controllers\ProductController::class,
        'show',
    ])
        ->name('products.show')
        ->middleware('permission:warehouse.product.show');

    Route::get('warehouse/product/{product}/edit', [
        App\Http\Controllers\ProductController::class,
        'edit',
    ])
        ->name('products.edit')
        ->middleware('permission:warehouse.product.edit');

    Route::patch('warehouse/product/{product}', [
        App\Http\Controllers\ProductController::class,
        'update',
    ])
        ->name('products.update')
        ->middleware('permission:warehouse.product.update');

    Route::delete('warehouse/product/{product}', [
        App\Http\Controllers\ProductController::class,
        'destroy',
    ])
        ->name('products.destroy')
        ->middleware('permission:warehouse.product.destroy');

    //category
    Route::get('warehouse/category/create', [
        App\Http\Controllers\CategoryController::class,
        'create',
    ])
        ->name('category.create')
        ->middleware('permission:warehouse.category.create');

    Route::post('warehouse/category', [
        App\Http\Controllers\CategoryController::class,
        'store',
    ])
        ->name('category.store')
        ->middleware('permission:warehouse.category.store');

    Route::get('warehouse/category', [
        App\Http\Controllers\CategoryController::class,
        'index',
    ])
        ->name('category.index')
        ->middleware('permission:warehouse.category.index');

    Route::get('warehouse/category/{category}', [
        App\Http\Controllers\CategoryController::class,
        'show',
    ])
        ->name('category.show')
        ->middleware('permission:warehouse.category.show');

    Route::get('warehouse/category/{category}/edit', [
        App\Http\Controllers\CategoryController::class,
        'edit',
    ])
        ->name('category.edit')
        ->middleware('permission:warehouse.category.edit');

    Route::patch('warehouse/category/{category}', [
        App\Http\Controllers\CategoryController::class,
        'update',
    ])
        ->name('category.update')
        ->middleware('permission:warehouse.category.update');

    Route::delete('warehouse/category/{category}', [
        App\Http\Controllers\CategoryController::class,
        'destroy',
    ])
        ->name('category.destroy')
        ->middleware('permission:warehouse.category.destroy');

    //Users
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])
        ->name('users.index')
        ->middleware('permission:users.index');

    Route::get('users/{user}', [
        App\Http\Controllers\UserController::class,
        'show',
    ])
        ->name('users.show')
        ->middleware('permission:users.show');

    Route::get('users/{user}/edit', [
        App\Http\Controllers\UserController::class,
        'edit',
    ])
        ->name('users.edit')
        ->middleware('permission:users.edit');

    Route::put('users/{user}', [
        App\Http\Controllers\UserController::class,
        'update',
    ])
        ->name('users.update')
        ->middleware('permission:users.update');

    Route::delete('users/{user}', [
        App\Http\Controllers\UserController::class,
        'destroy',
    ])
        ->name('users.destroy')
        ->middleware('permission:users.destroy');

    //Orders
    Route::get('orders/create', [
        App\Http\Controllers\OrdersController::class,
        'create',
    ])
        ->name('orders.create')
        ->middleware('permission:orders.create');

    Route::post('orders', [
        App\Http\Controllers\OrdersController::class,
        'store',
    ])
        ->name('orders.store')
        ->middleware('permission:orders.store');

    Route::get('orders', [
        App\Http\Controllers\OrdersController::class,
        'index',
    ])
        ->name('orders.index')
        ->middleware('permission:orders.index');

    Route::get('orders/{order}', [
        App\Http\Controllers\OrdersController::class,
        'show',
    ])
        ->name('orders.show')
        ->middleware('permission:orders.show');

    Route::put('orders/{order}', [
        App\Http\Controllers\OrdersController::class,
        'update',
    ])
        ->name('orders.update')
        ->middleware('permission:orders.update');

    Route::delete('orders/{order}', [
        App\Http\Controllers\OrdersController::class,
        'destroy',
    ])
        ->name('orders.destroy')
        ->middleware('permission:orders.destroy');

    Route::get('/orderDay', [
        App\Http\Controllers\OrdersController::class,
        'orderDay',
    ])
        ->name('ordersDay.index')
        ->middleware('permission:ordersDay.index');

    //Compras

    Route::get('/compras', [
        App\Http\Controllers\ShoppingCartsController::class,
        'misCompras',
    ])
        ->name('misCompras.index')
        ->middleware('permission:misCompras.index');

    //Visit

    Route::get('/estadisticas', [
        App\Http\Controllers\StadisticsController::class,
        'visits',
    ]);
});
