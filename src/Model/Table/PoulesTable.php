<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

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


    //public function getAvailableGroup(int $categId, string $sexe, int $poids, int $gigue, int $club, int $maxCandSameClub) {
    public function getAvailableGroup($categId, $sexe, $poids, $gigue, $maxInGroup, $maxCandSameClub, $club) {

        $this->connection = ConnectionManager::get('default');
        $req = "call getAvailableGroup(".$categId.", '".$sexe."', ".$poids.", ".$gigue.", ".$maxInGroup.", ".$maxCandSameClub.", ".$club.")";
        //debug($req);
        $Poules = $this->connection->execute($req);
        $row = $Poules->fetch('assoc');
        //debug($row);
        /*debug($row);
        debug($row["pouleId"]);
        die();*/

        if (isset($row)) {
            $pouleId = $row["pouleId"];
        } else {
            $pouleId = -1;
        }

        # Parmi la liste des poules récupérées, on cherche une poule n'ayant pas trop de candidat du même club.

        return $pouleId;
    }

}
