<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_city_id')->references('id')
                ->on('cities')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('destination_city_id')->references('id')
                ->on('cities')
                ->cascadeOnDelete();
            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');
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
        Schema::dropIfExists('flights');
    }
}
