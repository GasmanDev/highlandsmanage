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
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price');
            // $table->string('dates');
            // $table->integer('revenues');
            // $table->string('rates');
            // $table->string('revenueshare');
            $table->boolean('published')->default(false);
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('for_user_id');
            // $table->boolean('published_to_all')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('for_user_id')->references('id')->on('users');
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
