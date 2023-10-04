<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonOfPollingStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_of_polling_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('amphoe')->nullable();
            $table->string('tambon')->nullable();
            $table->string('polling_station_at')->nullable();
            $table->string('quantity_person')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('person_of_polling_stations');
    }
}
