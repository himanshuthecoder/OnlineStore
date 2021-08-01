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
            $table->bigInteger('store_id')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('category')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();            
            $table->timestamps();
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
