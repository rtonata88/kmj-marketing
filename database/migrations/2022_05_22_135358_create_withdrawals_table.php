<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->date('request_date');
            $table->decimal('requested_amount', 15, 2);
            $table->decimal('charges', 15, 2);
            $table->decimal('payout_amount', 15, 2);
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('payout_method_id');
            $table->date('process_date')->nullable();
            $table->unsignedBigInteger('processed_by');

            $table->foreign('payout_method_id')->references('id')->on('payout_methods');
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
        Schema::dropIfExists('withdrawals');
    }
}
