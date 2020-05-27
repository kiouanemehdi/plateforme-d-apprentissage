<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrits', function (Blueprint $table) {
            $table->integer('ID_etd')->unsigned();
            
            $table->integer('ID_class')->unsigned();
            
            $table->dateTime('date_inscription');
            $table->timestamps();
        });
        Schema::table('inscrits', function($table)
        {
            $table->foreign('ID_etd')->references('ID_etd')->on('etudiants')->onDelete('cascade');
            $table->foreign('ID_class')->references('ID_class')->on('classes')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscrits');
    }
}
