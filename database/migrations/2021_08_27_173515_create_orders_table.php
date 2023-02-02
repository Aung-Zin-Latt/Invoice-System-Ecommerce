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
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->integer('total');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('township_id')->unsigned();
            $table->string('zipcode')->nullable();
            $table->enum('status', ['ordered', 'delivered', 'canceled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->binary('user_sign')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
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
