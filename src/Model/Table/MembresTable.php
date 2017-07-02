<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MembresTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('mem_nom', "Le nom est obligatoire.")
            ->notEmpty('mem_prenom', 'Le prénom est obligatoire.')
            ->notEmpty('mem_datnaiss', 'Un role est nécessaire')
            ->email('mem_mail');
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Villes', [
            'className' => 'Villes',
            'foreignKey' => 'mem_idville',
            'fields' => 'id'
        ]);
    }



}
