<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClubsTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('clu_nom', "Le nom du club doit être renseigné.")
            ->notEmpty('clu_ville', "La ville du club doit être renseignée.");
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->table('comp_clubs');
        $this->addBehavior('Timestamp');
     
        $this->belongsTo('Villes', [
            'className' => 'Villes',
            'foreignKey' => 'clu_idville',
            'fields' => 'id'
        ]);

    }



}
