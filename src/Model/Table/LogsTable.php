<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class LogsTable extends Table
{


    /*public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('clu_nom', "Le nom du club doit être renseigné.")
            ->notEmpty('clu_ville', "La ville du club doit être renseignée.");
    }*/


    // Pour activer la mise à jour automatique des champs created et modified.
    public function initialize(array $config) {

        $this->addBehavior('Timestamp');
     
        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'log_userId',
            'fields' => 'id'
        ]);

    }



    // 
    public function addLog($id, $action) {

        $log = $this->Logs->newEntity();
        $log->log_userId = $id;
        $log->log_action = $action;
        $log->log_srcip = $_SERVER["REMOTE_ADDR"];

        if ($this->Logs->save($log)) {
            
        }

    }



}
