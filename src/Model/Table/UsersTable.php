<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', "Un nom d'utilisateur est nécessaire")
            ->notEmpty('password', 'Un mot de passe est nécessaire')
            ->notEmpty('role', 'Un role est nécessaire')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'user', 'register_agent']],
                'message' => 'Merci de rentrer un role valide'
            ]);
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
    }

}
