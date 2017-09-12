<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChallengesTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('cha_nom', "Le nom du challenge doit être renseigné.");
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->table('comp_challenges');
        $this->addBehavior('Timestamp');
     

    }



}
