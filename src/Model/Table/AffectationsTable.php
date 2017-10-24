<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AffectationsTable extends Table
{


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->table('comp_affectations');
        $this->addBehavior('Timestamp');
     
        $this->belongsTo('Poules', [
            'className' => 'Poules',
            'foreignKey' => 'aff_idpoule',
            'fields' => 'id'
        ]);
     
        $this->hasOne('Candidats', [
            'className' => 'Candidats',
            'foreignKey' => 'id',
            'bindingKey' => 'aff_idcandidat'
        ]);

    }

}
