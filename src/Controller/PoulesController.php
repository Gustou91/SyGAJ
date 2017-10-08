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


        $poules = $this->Poules->find('all', ['contain' =>['Categories']]);

        $this->set('poules', $poules);
        

    }


    // Affecter les candidats.
    public function allocateCandidates()
    {

        $subquery = $this->Poules->Affectations->find()
        ->select(['Affectations.aff_idcandidat']);

        $candidats = $this->Poules->Affectations->Candidats->find()
        ->where(['id NOT IN' => $subquery])
        ->order(['can_clef']);
        //$this->log("Liste des candidats non affectés: ".$this->request);

        $nbCandidats = 0;       // Nombre de candidats dans la poule courante.
        $maxCandidats = 4;      // Nombre max de candidats par poule.
        $maxEcartPoids = 3;     // Ecart max de poids entre le plus léger et le plus lourd dans la poule.
        $idPoule = -1;          // Id de la poule courante.

        foreach($candidats as $candidat) {

            # Récupération de la catégorie du candidat.
            $clef = explode("-", $candidat->can_clef);
            $idCateg = $clef[0];
            $this->log("Nom du candidat courant         : ".$candidat->can_nom." ".$candidat->can_prenom);
            $this->log("Clef du candidat courant        : ".$candidat->can_clef);
            $this->log("Catégorie du candidat courant   : ".$idCateg);
            $this->log("Sexe du candidat courant        : ".$candidat->can_sexe);
            $this->log("Poids du candidat courant       : ".$candidat->can_poids);
            $this->log("Nb candidats affectés à la poule: ".$nbCandidats);
            $this->log("Nb max de candidats par poule   : ".$maxCandidats);

            if (isset($poule)) {

                $this->log("Ecart de poids                  : ".($candidat->can_poids - $poule->pou_poidsmin));

                if($idCateg == $poule->pou_idcateg) {
                    $this->log("Catégorie identique.");
                } else {
                    //debug($poule);
                    $this->log("Catégorie différente: ".$poule->pou_idcateg);
                }

                if($candidat->can_sexe == $poule->pou_sexe) {
                    $this->log("Sexe identique.");
                } else {
                    $this->log("Sexe différent.");
                }

                if(($candidat->can_poids - $poule->pou_poidsmin) <= $maxEcartPoids) {
                    $this->log("Poids dans la plage.");
                } else {
                    $this->log("Poids hors plage.");
                }

                if($nbCandidats < $maxCandidats) {
                    $this->log("Il reste de la place dans la poule.");
                } else {
                    $this->log("Plus de place dans la poule.");
                }
            } else {
                $this->log("Poule non définie.");
            }

            # Conditions de création d'une nouvelle poule.
            if ($nbCandidats == 0 ||
                $idCateg != $poule->pou_idcateg || 
                $candidat->can_sexe != $poule->pou_sexe || 
                ($candidat->can_poids - $poule->pou_poidsmin) > $maxEcartPoids ||
                ($nbCandidats == $maxCandidats)) {

                # Création d'une nouvelle poule.
                $this->log("Création d'une nouvelle poule.");
                $idPoule = -1;
                $poule = $this->Poules->newEntity();
                $poule->pou_idcateg = $idCateg;
                $poule->pou_sexe = $candidat->can_sexe;
                $poule->pou_poidsmin = $candidat->can_poids;
                $nbCandidats = 0;

                if ($this->Poules->save($poule)) {
                    $this->log("Création de la nouvelle poule réussie.");
                    $idPoule = $poule->id;
                }              

            }


            # Si la poule a bien été créée.
            if ($idPoule != -1) {

                # Ajout du candidat dans la poule.
                $this->log("Ajout du candidat ".$candidat->id." ".$candidat->can_nom." ".$candidat->can_prenom." dans la poule ".$idPoule.".");
                $this->loadModel('Affectations');

                $affectation = $this->Affectations->newEntity();
                $affectation->aff_idpoule = $idPoule;
                $affectation->aff_idcandidat = $candidat->id;

                if ($this->Affectations->save($affectation)) {
                    $idAffectation = $affectation->id;
                    $nbCandidats++;
                } 

            }

        }


        $this->set('candidats', $candidats);

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