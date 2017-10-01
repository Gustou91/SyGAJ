<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CandidatsTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('can_nom', "Le nom du candidat doit être renseigné.");
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->table('comp_candidats');
        $this->addBehavior('Timestamp');
     
        $this->belongsTo('Clubs', [
            'className' => 'Clubs',
            'foreignKey' => 'can_idclub',
            'fields' => 'id'
        ]);

        $this->belongsTo('Villes', [
            'className' => 'Villes',
            'foreignKey' => 'can_idville',
            'fields' => 'id'
        ]);

        $this->belongsTo('Affectations', [
            'className' => 'Affectations',
            'foreignKey' => 'aff_idcandidat',
            'fields' => 'id'
        ]);
    }



}
