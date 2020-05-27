<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('ID_post');
            $table->integer('ID_prof')->unsigned();
            
            $table->string('objet',100);
            $table->string('detail');
            $table->string('type');
            $table->dateTime('date');
            $table->timestamps();
        });
        Schema::table('posts', function($table)
        {
            $table->foreign('ID_prof')->references('ID_prof')->on('profs')->onDelete('cascade');
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
