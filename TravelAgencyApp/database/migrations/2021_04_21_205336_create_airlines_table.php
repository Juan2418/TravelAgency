<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('airline_city', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->unsignedBigInteger('airline_id')->references('id')->on('áirlines')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['city_id', 'airline_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airlines');
    }
}
