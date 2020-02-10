<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemandeEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande__evenements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('club_id')->unsigned()->nullable()->index();
            $table->string('Name', 255)->nullable();
            $table->string('Lieu')->nullable();
            $table->string('date')->nullable();
            $table->string('Start')->nullable();
            $table->string('End')->nullable();
            $table->string('description', 1000)->nullable();
            $table->boolean('confirmed')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demande__evenements');
    }
}
