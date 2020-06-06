<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_posts', function (Blueprint $table) {
             $table->increments('ID_post');
             $table->integer('ID_etd')->unsigned();
             $table->string('type');
             $table->string('topic');
             $table->string('objet',100);
             $table->text('detail');
             $table->string('visibility');
             $table->dateTime('date');
             $table->timestamps();
        });
         Schema::table('student_posts', function($table)
        {
            $table->foreign('ID_etd')->references('ID_etd')->on('etudiants')->onDelete('cascade');
            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_posts');
    }
}
