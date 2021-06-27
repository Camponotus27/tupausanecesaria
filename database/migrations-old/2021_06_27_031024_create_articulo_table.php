<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_categoria');
            $table->string('nombre', 250);
            $table->integer('stock')->default(0);
            $table->integer('precio');
            $table->integer('cant_insumos')->default(1);
            $table->integer('crema')->default(0);
            $table->integer('azucar')->default(0);
            $table->string('descripcion', 1000)->nullable();
            $table->string('imagen', 100)->nullable();
            $table->string('estado', 25);
            $table->foreign('id_categoria', 'articulo_ibfk_1')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
