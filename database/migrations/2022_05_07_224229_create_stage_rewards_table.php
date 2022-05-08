<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('value');
            $table->unsignedBigInteger('stage_id');

            $table->foreign('stage_id')->references('id')->on('stages');
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
        Schema::dropIfExists('stage_rewards');
    }
}
