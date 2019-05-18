<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table) {
            $table->string('id_departement');
            $table->primary('id_departement');
            $table->string('id_agence_fk');
            $table->foreign('id_agence_fk')->references('id_agence')->on('agence');
            $table->string('label_departement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departement');
    }
}
