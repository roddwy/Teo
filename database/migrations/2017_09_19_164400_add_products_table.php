<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsTable extends Migration
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
            $table->string('cod');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->integer('punctuation');
            $table->decimal('price_business_bol',13,2);
            $table->decimal('price_customers_bol',13,2);
            $table->decimal('price_business_sol',13,2);
            $table->decimal('price_customers_sol',13,2);
            $table->decimal('price_business_dollar',13,2);
            $table->decimal('price_customers_dollar',13,2);
            $table->integer('phase_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('phase_id')->references('id')->on('phases');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
