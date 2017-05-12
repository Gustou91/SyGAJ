<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('art_nom', "Le nom de l'article est obligatoire (ex: Ecusson)");

    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
    }

}