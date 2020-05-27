<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('ID_etd');
            $table->integer('ID_univ')->unsigned();
            $table->string('username',55);
            $table->string('email',100);
            $table->string('password');
            $table->timestamps();
        });
        Schema::table('etudiants', function($table)
        {
        $table->foreign('ID_univ')->references('ID_univ')->on('universites')->onDelete('cascade');
        $table->unique('username');
        $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
