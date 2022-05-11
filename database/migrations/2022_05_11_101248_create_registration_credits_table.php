<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->string('from_name');
            $table->string('to_name');
            $table->string('transaction_description');
            $table->date('transaction_date');
            $table->decimal('debit_amount', 15, 2);
            $table->decimal('credit_amount', 15, 2);

            $table->foreign('from_id')->references('id')->on('investors');
            $table->foreign('to_id')->references('id')->on('investors');
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
        Schema::dropIfExists('registration_credits');
    }
}
