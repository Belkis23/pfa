<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemandeSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande__salles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('Club_id')->unsigned()->nullable()->index();
            $table->integer('Salle_id')->unsigned()->nullable()->index();
            $table->string('date')->nullable();
            $table->string('Start')->nullable();
            $table->string('End')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demande__salles');
    }
}
