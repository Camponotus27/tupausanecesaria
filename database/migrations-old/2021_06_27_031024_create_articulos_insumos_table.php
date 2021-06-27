<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_insumos', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('articulo_id');
            $table->integer('insumo_id');
            $table->integer('cant_porcion')->default(1);
            $table->timestamps();
            $table->foreign('articulo_id', 'articulos_insumos_ibfk_1')->references('id')->on('articulo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('insumo_id', 'articulos_insumos_ibfk_2')->references('id')->on('insumos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_insumos');
    }
}
