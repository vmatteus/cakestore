<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cake_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cake_id');
            $table->string('status');
            $table->string('weight');
            $table->string('price');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cake_id')
                  ->references('id')
                  ->on('cakes');
        });

        Schema::create('cake_interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cake_id');
            $table->string('status');
            $table->string('email');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cake_id')
                  ->references('id')
                  ->on('cakes');
        });    
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cake_interests');
        Schema::dropIfExists('cake_stocks');
        Schema::dropIfExists('cakes');
    }
}
