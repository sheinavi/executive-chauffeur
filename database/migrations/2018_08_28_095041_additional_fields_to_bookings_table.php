<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalFieldsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('booking_source')->nullable();
            $table->string('reference')->nullable();
            $table->integer('passengers_count')->default('1');
            $table->integer('is_return')->default('0'); //0-no 1-yes
            $table->dateTime('return_journey_date')->nullable();
            $table->integer('payment_processed')->default('0'); //0-no 1-yes
            $table->integer('poi')->nullable(); //get from another table
            $table->integer('pc')->nullable(); //get from another table
            $table->integer('airport_id')->nullable();
            $table->string('flight_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
