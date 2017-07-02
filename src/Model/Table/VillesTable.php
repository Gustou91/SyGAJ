<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class VillesTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('vil_cp', "Le code postal de la ville est obligatoire (ex: 91630)")
            ->notEmpty('vil_nom', "Le nom de la ville est obligatoire (ex: Cheptainville)");

    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
    }

}