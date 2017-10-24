<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PoulesController extends AppController
{
    
    public function initialize()
        {
            parent::initialize();
            $this->loadComponent('Flash');
            $this->loadComponent('RequestHandler');
 
        }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


    // Liste des poules.
    public function index()
    {


        $poules = $this->Poules->find('all', [
            'contain' =>['Categories'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);
        /*debug($poules->toArray());
        die();*/

        $this->set('poules', $poules);
        

    }


    // Liste des candidat non affectés à un groupe.
    public function notAffectedCandidates()
    {

        // Recherche de la liste des candidats non affectés à une poule.
        $subquery = $this->Poules->Affectations->find()
        ->select(['Affectations.aff_idcandidat']);

        $candidats = $this->Poules->Affectations->Candidats->find()
        ->where(['id NOT IN' => $subquery])
        ->order(['can_clef']);

        $this->set('candidats', $candidats);

    }



    // Affichage de la composition des groupes.
    public function groupComposition() 
    {

        $this->viewBuilder()->template('groups');

        # Récupération de la liste des affectations pou affichage.
        $poulesList = $this->Poules->find('all', [
            'recursive' => 3,
            'contain' =>['Affectations', 'Categories','Affectations.Candidats','Affectations.Candidats.Clubs'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);
        /*
        $poulesList = $this->Poules->find('all', [
            'contain' =>['Affectations'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ])->join([
            'table' => 'comp_candidats',
            'alias' => 'c',
            'type' => 'LEFT',
            'conditions' => 'c.id = comp_affectations.aff_idcandidat',
        ]);
        */

        /*debug($poulesList->toArray());
        die();*/

        $this->set('poulesList', $poulesList);

    } 



    // Affecter les candidats.
    public function allocateCandidates()
    {
        /*$testPoules = $this->Poules->getAvailableGroup(2, 'F', 20, 4, 3, 5);
        debug($testPoules);
        foreach($testPoules as $testPoule) {
            debug($testPoule->aff_idpoule);
        }
        die();*/
        $this->view = 'groups.ctp';

        // Recherche de la liste des candidats non affectés à une poule.
        $subquery = $this->Poules->Affectations->find()
        ->select(['Affectations.aff_idcandidat']);

        $candidats = $this->Poules->Affectations->Candidats->find()
        ->where(['id NOT IN' => $subquery])
        ->order(['can_clef']);
        //$this->log("Liste des candidats non affectés: ".$this->request);

        //$nbCandidats = 0;   // Nombre de candidats dans la poule courante.
        $maxCandidats = 4;    // Nombre max de candidats par poule.
        $maxEcartPoids = 3;   // Ecart max de poids entre le plus léger et le plus lourd dans la poule.
        $maxMemeClub = 2;     // Nombre max de candidat du même club dans la même poule.
        //$idPoule = -1;      // Id de la poule courante.

        foreach($candidats as $candidat) {


            # Récupération de la catégorie du candidat.
            $clef = explode("-", $candidat->can_clef);
            $idCateg = $clef[0];
            $this->log("Nom du candidat courant         : ".$candidat->can_nom." ".$candidat->can_prenom);
            $this->log("Clef du candidat courant        : ".$candidat->can_clef);
            $this->log("Catégorie du candidat courant   : ".$idCateg);
            $this->log("Sexe du candidat courant        : ".$candidat->can_sexe);
            $this->log("Poids du candidat courant       : ".$candidat->can_poids);
            $this->log("Nb max de candidats par poule   : ".$maxCandidats);

            // Recherche d'une poule compatible pour le candidat.
            $idPoule = $this->Poules->getAvailableGroup(
                $idCateg, 
                $candidat->can_sexe, 
                $candidat->can_poids, 
                $maxEcartPoids, 
                $maxCandidats,
                $maxMemeClub,
                $candidat->can_idclub);

            //debug($idPoule);

            if (isset($idPoule) && $idPoule > -1) {

                // On a trouvé une poule compatible.
                $this->log("Une poule compatible a été trouvée.");

            } else {

                // Pas de poule dispo, on en créé une nouvelle.
                $this->log("Création d'une nouvelle poule.");
                $idPoule = -1;
                $poule = $this->Poules->newEntity();
                $poule->pou_idcateg = $idCateg;
                $poule->pou_sexe = $candidat->can_sexe;
                $poule->pou_poidsmin = $candidat->can_poids;

                if ($this->Poules->save($poule)) {
                    $this->log("Création de la nouvelle poule réussie :".$poule->id);
                    $idPoule = $poule->id;
                } 
            }


            # Si la poule a bien été créée ou récupérée.
            if ($idPoule != -1) {

                # Ajout du candidat dans la poule.
                $this->log("Ajout du candidat ".$candidat->id." ".$candidat->can_nom." ".$candidat->can_prenom." dans la poule ".$idPoule.".");
                $this->loadModel('Affectations');

                $affectation = $this->Affectations->newEntity();
                $affectation->aff_idpoule = $idPoule;
                $affectation->aff_idcandidat = $candidat->id;

                if ($this->Affectations->save($affectation)) {
                    $idAffectation = $affectation->id;
                } 

            }

        }


        # Récupération de la liste des affectations pou affichage.
        $poulesList = $this->Poules->find('all', [
            'contain' =>['Affectations'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);

        $this->set('$poulesList', $poulesList);

    }
    


    public function view($id)
    {
        $poule = $this->Poules->get($id);
        $this->set(compact('poule'));
    }
 

    // Suppression d'une poule.
    public function delete($id)
    {
        // Chargement de la poule à supprimer.
        $poule = $this->Poules->get($id);

        // Suppresion de la poule.
        $this->Poules->delete($poule);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Poules',
            'action' => 'index'));
    }
}