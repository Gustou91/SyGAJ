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


    // Retourne les informations sur la tranche de poids correspondant à un candidat
    // en catégorie de type FFJA.
    public function getWeightRange($poids)
    {

        // Initialisation de la tables des tranches de poids pour les benjamins.
        $WeightRanges = array(
            30 => array( "poidsMin" => 0, "gigue" => 29 ),
            34 => array( "poidsMin" => 30, "gigue" => 3 ),
            38 => array( "poidsMin" => 34, "gigue" => 3 ),
            42 => array( "poidsMin" => 38, "gigue" => 3 ),
            46 => array( "poidsMin" => 42, "gigue" => 3 ),
            50 => array( "poidsMin" => 46, "gigue" => 3 ),
            55 => array( "poidsMin" => 50, "gigue" => 4 ),
            60 => array( "poidsMin" => 55, "gigue" => 4 ),
            66 => array( "poidsMin" => 60, "gigue" => 5 ),
            "*" => array( "poidsMin" => 66, "gigue" => 100 )
        );

        /*debug($WeightRanges);
        debug($WeightRanges[30]);
        die();*/
        foreach ($WeightRanges as $range) {
            if ($poids < key($range) )
            {
                return $range;
            }
        }

        // Si on est là, c'est qu'on est hors plage.
        // On utilise la plage joker.
        return $WeightRanges["*"];

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
