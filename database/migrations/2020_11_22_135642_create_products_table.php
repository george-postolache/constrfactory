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
            $table->bigIncrements('id');
            $table->engine = 'InnoDB';
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('contracts_products', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('contracts_id');
            $table->timestamps();

            $table->unique(['products_id','contracts_id']);
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('contracts_id')->references('id')->on('contracts')->onDelete('cascade');
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
