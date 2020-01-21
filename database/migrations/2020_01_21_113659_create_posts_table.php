<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('club_id')->unsigned()->nullable()->index();
            $table->string('Titre')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('photo')->nullable();
            $table->string('date')->nullable();
            $table->string('lieu')->nullable();
            $table->integer('etudiant_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
