<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Materiel extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_materiel', 'type', 'modele','N_serie','id_utilisateur','id_agence_fk',
        'id_departement_fk','date_livraison','id_fournisseurs','marche','etat'
    ];

   
}
