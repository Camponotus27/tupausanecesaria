<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosComplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_complements', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->bigIncrements('product_id');
            $table->bigIncrements('complement_id');
            $table->integer('cant_porcion')->default(1);
            $table->timestamps();
            $table
                ->foreign('product_id', 'products_complements_ibfk_1')
                ->references('id')
                ->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('complement_id', 'products_complements_ibfk_2')
                ->references('id')
                ->on('complements')
                ->onDelete('cascade')
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
        Schema::dropIfExists('products_complements');
    }
}
