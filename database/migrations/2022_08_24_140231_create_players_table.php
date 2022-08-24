<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('nick');
            $table->string('name');
            $table->timestamp('birth_date');
            $table->bigInteger('country_id');
            $table->bigInteger('team_id');
            $table->bigInteger('game_id');
            $table->integer('mvp_count');
            $table->integer('won_tournament_count');
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
        Schema::dropIfExists('players');
    }
};
