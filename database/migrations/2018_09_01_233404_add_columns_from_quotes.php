<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFromQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('charge_subtotal')->default('0.00')->after('amount');
            $table->integer('charge_waiting')->default('0.00');
            $table->integer('charge_congestion')->default('0.00');
            $table->integer('charge_service')->default('0.00');
            $table->string('vehicle_info')->nullable();
            $table->string('return_address')->nullable();
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
