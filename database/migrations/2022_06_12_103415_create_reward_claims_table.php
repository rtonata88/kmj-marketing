<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->date('request_date');
            $table->unsignedBigInteger('stage_reward_id');
            $table->string('cash_yn')->default('No');
            $table->decimal('bank_charges', 15, 2)->nullable();
            $table->decimal('payout_amount', 15, 2)->nullable();
            $table->string('status')->default('pending');
            $table->date('process_date')->nullable();
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->foreign('stage_reward_id')->references('id')->on('stage_rewards');
            $table->foreign('investor_id')->references('id')->on('investors');
            $table->foreign('processed_by')->references('id')->on('users');
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
        Schema::dropIfExists('reward_claims');
    }
}
