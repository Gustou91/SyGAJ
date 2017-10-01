<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PoulesTable extends Table
{


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->table('comp_poules');
        $this->addBehavior('Timestamp');
     
        $this->belongsTo('Categories', [
            'className' => 'Categories',
            'foreignKey' => 'pou_idcateg',
            'fields' => 'id'
        ]);
     
        $this->hasMany('Affectations', [
            'className' => 'Affectations',
            'foreignKey' => 'aff_idpoule',
            'fields' => 'id'
        ]);
    }

}
