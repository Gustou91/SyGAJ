<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DetailcommandesTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('det_idcde', "La ligne d'une commande doit être attachée à une commande.");
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Commandes', [
            'className' => 'Commandes',
            'foreignKey' => 'det_idcde',
            'fields' => 'id'
        ]);

        $this->hasOne('Articles', [
            'className' => 'Articles',
            'foreignKey' => 'det_idarticle',
            'fields' => 'id'
        ]);
    }



}
