<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteKanAllScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_kan_all_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name_amphoe')->nullable();
            $table->string('number_1')->nullable();
            $table->string('number_2')->nullable();
            $table->string('Amount_person')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vote_kan_all_scores');
    }
}
