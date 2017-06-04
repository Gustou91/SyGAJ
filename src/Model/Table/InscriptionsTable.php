<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class InscriptionsTable extends Table
{

    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('ins_idsaison', "La saison est obligatoire.")
            ->notEmpty('ins_idmembre', 'Le membre est obligatoire.')
            ->notEmpty('ins_idcours', 'Le cours est nécessaire');
    }


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Saisons', [
            'className' => 'Saisons',
            'foreignKey' => 'ins_idsaison',
            'fields' => 'id'
        ]);

        $this->belongsTo('Cours', [
            'className' => 'Cours',
            'foreignKey' => 'ins_idcours',
            'fields' => 'id'
        ]);

        $this->belongsTo('Membres', [
            'className' => 'Membres',
            'foreignKey' => 'ins_idmembre',
            'fields' => 'id'
        ]);

    }

}
