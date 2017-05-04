<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoursTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('cou_nom', "Le nom du cours est obligatoire (ex: Judo 1)");

    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
    }

}