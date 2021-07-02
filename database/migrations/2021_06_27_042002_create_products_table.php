<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category')->nullable();
            $table->string('nombre', 250);
            $table->integer('stock')->default(0);
            $table->integer('precio');
            $table->integer('cant_complements')->default(1);
            $table->integer('crema')->default(0);
            $table->integer('azucar')->default(0);
            $table->string('descripcion', 1000)->nullable();
            $table->string('imagen', 100)->nullable();
            $table->string('estado', 25);
            $table->timestamps();
            $table
                ->foreign('id_category', 'product_ibfk_1')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
