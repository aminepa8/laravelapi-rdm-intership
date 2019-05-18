<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infosession', function (Blueprint $table) {
            $table->unsignedInteger('id_session_fk');
            $table->foreign('id_session_fk')->references('id_session')->on('session');
            $table->string('id_materiel_fk');
            $table->foreign('id_materiel_fk')->references('id_materiel')->on('materiel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infosession');
    }
}
