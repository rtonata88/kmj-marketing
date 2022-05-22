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
            $table->string('transaction_description');
            $table->date('transaction_date');
            $table->decimal('debit_amount', 15, 2);
            $table->decimal('credit_amount', 15, 2);

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
