<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('line1', 120)->nullable();
            $table->string('line2', 120)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('postal_code', 120)->nullable();
            $table->string('country_code', 120)->nullable();
            $table->string('state', 120)->nullable();
            $table->string('recipient_name', 120);
            $table->string('email', 120);
            $table->string('status', 120)->default('creado');
            $table->string('guide_number', 120)->nullable();
            $table->decimal('total', 11, 2);
            $table->integer('pagado')->default(0);
            $table->timestamps();
            $table->foreign('shopping_id', 'orders_ibfk_1')->references('id')->on('shopping_carts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id', 'orders_ibfk_2')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
