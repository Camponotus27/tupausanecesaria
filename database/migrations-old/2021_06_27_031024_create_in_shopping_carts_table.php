<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id');
            $table->integer('articulo_id');
            $table->string('crema', 100)->nullable();
            $table->string('azucar', 100)->nullable();
            $table->string('servir', 100)->nullable();
            $table->string('insumos')->nullable();
            $table->timestamps()->default('current_timestamp()');
            $table->foreign('shopping_cart_id', 'in_shopping_carts_ibfk_1')->references('id')->on('shopping')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_shopping_carts');
    }
}
