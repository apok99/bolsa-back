<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BankLoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_loan_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('loan_id');
            $table->integer('places_until_finish');
            $table->datetime('requested_at');
            $table->datetime('first_payment_date');
            $table->datetime('next_payment_date');

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
        //
    }
}
