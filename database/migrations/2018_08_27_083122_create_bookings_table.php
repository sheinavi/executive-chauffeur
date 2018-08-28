<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('client_id');
            $table->integer('driver_id');
            $table->integer('vehicle_id');
            $table->enum('status',['pending','confirmed','completed','paid'])->default('pending');
            $table->string('journey_from');
            $table->string('journey_to');
            $table->dateTime('pickup_datetime');
            $table->dateTime('dropped_datetime');
            $table->mediumText('instructions');
            $table->float('amount')->default('0.00');
            $table->float('car_park')->default('0.00');
            $table->float('toll_charges')->default('0.00');
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
        Schema::dropIfExists('bookings');
    }
}
