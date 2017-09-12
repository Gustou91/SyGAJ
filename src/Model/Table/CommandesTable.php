<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommandesTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('cmd_idmembre', "La commande doit ête attachée à un membre.");
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->hasMany('Detailcommandes', [
            'className' => 'Detailcommandes',
            'foreignKey' => 'det_idcde',
            'fields' => 'id'
        ]);   

        $this->belongsTo('Membres', [
            'className' => 'Membres',
            'foreignKey' => 'cmd_idmembre',
            'fields' => 'id'
        ]);          

    }



}
