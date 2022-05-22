<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile_number');
            $table->tinyInteger('status')->default(0);
            $table->nestedSet();
            $table->unsignedBigInteger('user_id')->default(1);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('stage_id')->default(1);

            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('town_id')->references('id')->on('towns');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('investors');
    }
}
