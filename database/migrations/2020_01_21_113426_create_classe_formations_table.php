<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasseFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_formations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('club_id')->unsigned()->nullable()->index();
            $table->integer('etudiant_id')->unsigned()->nullable()->index();
            $table->string('post')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classe_formations');
    }
}
