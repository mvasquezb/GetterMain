<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('description');
            $table->integer('product_id')->unsigned();
            $table->integer('store_id')->unsigned();
            $table->integer('offer_type_id')->unsigned();
            $table->boolean('active')->default(true);
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('offer_type_id')->references('id')->on('offer_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
