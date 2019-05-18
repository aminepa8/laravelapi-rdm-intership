<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention', function (Blueprint $table) {
            $table->increments('id_intervention');
            $table->string('id_materiel_fk');
            $table->foreign('id_materiel_fk')->references('id_materiel')->on('materiel');
            $table->string('observation');
            $table->date('datepb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervention');
    }
}
