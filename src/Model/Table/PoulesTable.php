<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
use Cake\Core\App;

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
    public function getWeightRange($poids, $sexe)
    {

        if ($sexe == "H") {

            // Initialisation de la tables des tranches de poids pour les benjamins.
            $WeightRanges = array(
                27 => array( "poidsMin" => 0, "gigue" => 26 ),
                30 => array( "poidsMin" => 26, "gigue" => 3 ),
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

        } else {

            // Initialisation de la tables des tranches de poids pour les benjamines.
            $WeightRanges = array(
                28 => array( "poidsMin" => 0, "gigue" => 27 ),
                32 => array( "poidsMin" => 27, "gigue" => 4 ),
                36 => array( "poidsMin" => 32, "gigue" => 3 ),
                40 => array( "poidsMin" => 36, "gigue" => 3 ),
                44 => array( "poidsMin" => 40, "gigue" => 3 ),
                48 => array( "poidsMin" => 44, "gigue" => 3 ),
                52 => array( "poidsMin" => 48, "gigue" => 3 ),
                57 => array( "poidsMin" => 52, "gigue" => 4 ),
                63 => array( "poidsMin" => 57, "gigue" => 5 ),
                "*" => array( "poidsMin" => 63, "gigue" => 100 )
            );
            
        }

        $invertedWeightRanges = array_reverse ( $WeightRanges , true );

        //debug($WeightRanges);
        /*debug($WeightRanges[30]);
        die();*/
        foreach ($invertedWeightRanges as $range) {
           if ($poids >= $range["poidsMin"] )
            {
                //$this->log("getWeightRange(): Poids = ".$range["poidsMin"]." gigue = ".$range["gigue"]);
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
        //$this->log("getAvailableGroup(): req = ".$req);
        //Log::write('debug', 'getAvailableGroup(): req = '.$req);
        $Poules = $this->connection->execute($req);
        $row = $Poules->fetch('assoc');
        
        //debug($row);
        //debug($row["pouleId"]);
        /*die();*/

        if (isset($row)) {
            $pouleId = $row["pouleId"];
        } else {
            $pouleId = -1;
        }

        # Parmi la liste des poules récupérées, on cherche une poule n'ayant pas trop de candidat du même club.

        return $pouleId;
    }


}
