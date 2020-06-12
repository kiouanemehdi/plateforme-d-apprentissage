<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPostEtdIdProfToReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reponses', function (Blueprint $table) {
            $table->integer('ID_prof')->unsigned()->change();
            $table->foreign('ID_prof')->references('ID_prof')->on('profs')->onDelete('cascade');
            $table->integer('ID_post_etd')->unsigned()->change();
            $table->foreign('ID_post_etd')->references('ID_post')->on('student_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reponses', function (Blueprint $table) {
            //
        });
    }
}
