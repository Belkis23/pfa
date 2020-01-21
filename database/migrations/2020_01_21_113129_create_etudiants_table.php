<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('prenom')->nullable();
            $table->string('cin')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('classe_id')->unsigned()->nullable()->index();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etudiants');
    }
}
