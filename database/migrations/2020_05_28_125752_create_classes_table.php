<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('ID_class');
            $table->integer('ID_univ')->unsigned();
            $table->integer('ID_prof')->unsigned();
            
            $table->integer('ID_sem')->unsigned();
            
            $table->string('code');
            $table->dateTime('date_creation');
            $table->timestamps();
        });
        Schema::table('classes', function($table)
        {
        $table->foreign('ID_univ')->references('ID_univ')->on('universites')->onDelete('cascade');
        $table->foreign('ID_prof')->references('ID_prof')->on('profs')->onDelete('cascade');
        $table->foreign('ID_sem')->references('ID_sem')->on('semestres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
