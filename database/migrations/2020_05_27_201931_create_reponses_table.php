<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->increments('ID_reponse');
            $table->integer('ID_post')->unsigned();
            
            $table->integer('ID_etd')->unsigned();
            
            $table->string('contenu');
            $table->dateTime('date');
            $table->timestamps();
        });
        Schema::table('reponses', function($table)
        {
            $table->foreign('ID_etd')->references('ID_etd')->on('etudiants')->onDelete('cascade');
            $table->foreign('ID_post')->references('ID_post')->on('posts')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reponses');
    }
}
