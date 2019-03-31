<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('place_id')->unsigned();
            $table->boolean('pool')->default(false);
            $table->boolean('football_s')->default(false);
            $table->boolean('volleyball_s')->default(false);
            $table->boolean('basketball_S')->default(false);
            $table->boolean('house')->default(false);
            $table->boolean('Kitchen')->default(false);
            $table->boolean('s_section')->default(false);
            $table->boolean('f_section')->default(false);
            $table->integer('lounges');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('wc');
            $table->timestamps();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descriptions');
    }
}
