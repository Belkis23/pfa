<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembreClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre_clubs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('etudiant_id')->unsigned()->nullable()->index();
            $table->integer('club_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('membre_clubs');
    }
}
