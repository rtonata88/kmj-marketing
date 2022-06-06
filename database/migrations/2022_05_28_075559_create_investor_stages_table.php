<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->unsignedBigInteger('stage_id');
            $table->integer('people');

            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('investor_id')->references('id')->on('investors');
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
        Schema::dropIfExists('investor_stages');
    }
}
