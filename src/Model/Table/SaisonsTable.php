<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SaisonsTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('sai_nom', "Le nom de la saison est obligatoire (ex: 2017-2018)");

    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
    }

}