<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CandidatsTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('can_nom', "Le nom du combattant doit être renseigné.")
            ->notEmpty('can_prenom', "Le nom du combattant doit être renseigné.")
            ->notEmpty('can_sexe', "Garçon ou fille?")
            ->notEmpty('can_idclub', "Choisissez le club.")
            ->notEmpty('can_poids', "Saisissez le poids.")
            ->notEmpty('can_datnaiss', "Saisissez la date de naissance.")
            ->notEmpty('can_ceinture', "Saisissez la ceinture.")
            ->requirePresence(['can_sexe', 'can_idclub'], 'create');
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

    }



}
