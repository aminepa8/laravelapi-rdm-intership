<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel', function (Blueprint $table) {
            $table->string('id_materiel');
            $table->primary('id_materiel');
            $table->string('type');
            $table->string('modele');
            $table->string('N_serie');
            $table->string('id_utilisateur');
            $table->string('id_agence_fk');
            $table->foreign('id_agence_fk')->references('id_agence')->on('agence');
            $table->string('id_departement_fk');
            $table->foreign('id_departement_fk')->references('id_departement')->on('materiel');
            $table->date('date_livraison');
            $table->string('id_fournisseurs');
            $table->string('marche');
            $table->string('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiel');
    }
}
