<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');            
            $table->string('name', 100)->nullable();
            $table->string('image')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('address')->nullable();
            $table->integer('contactno')->nullable();
            $table->integer('storetype')->nullable();            
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
        Schema::dropIfExists('stores');
    }
}
