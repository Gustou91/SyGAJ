<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class PoulesController extends AppController
{
    
    private $categId = "";

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



    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action
        if (isset($user['role']) 
            && ($user['role'] === 'admin'
            || $user['role'] ===  'challenge_master'
        )) {
            return true;
        }

        // Par défaut refuser
        return false;
    }

    // Liste des poules.
    public function index()
    {

            $poules = $this->Poules->find('all', [
            'contain' =>['Categories'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);


        if ($this->request->is(['get'])) {
            if (isset($this->request->query['categorie'])) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $categId = $this->request->query['categorie'];
                $poules->where(['pou_idcateg' => $categId]);
            } else {
                $categId = "";
            }
        }

        /*debug($poules);
        die();*/

        $this->set('poules', $poules);        

        // Pour la liste des catégories dans le SELECT.
        $this->loadModel('Categories');

        $categories = $this->Categories->find('list', [
            'keyField' => 'id',
            'valueField' => function ($category) {
                return $category->get('Label');
            },
            'order' => 'cat_nom ASC'
        ]);

        $data = $categories->toArray();
        $this->set('categories', $data);

        $this->set('categId', $categId);


    }


    // Liste des candidat non affectés à un groupe.
    public function printPoulesTest()
    {

        $this->viewBuilder()->template('print_poules');

        # Récupération de la liste des affectations pour affichage.
        $poulesList = $this->Poules->find('all', [
            'recursive' => 3,
            'contain' =>['Affectations', 'Categories','Affectations.Candidats','Affectations.Candidats.Clubs'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);

        if ($this->request->is(['get'])) {
            if (isset($this->request->query['categorie'])) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $categId = $this->request->query['categorie'];
                $poulesList->where(['pou_idcateg' => $categId]);
            } else {
                $categId = "";
            }
        }

        $this->set('poulesList', $poulesList);

        $this->loadModel('Challenges');
        $challenge = $this->Challenges->get(1);

        $this->set('challenge', $challenge);

        $this->set('categId', $categId);

    }




    // Liste des candidat non affectés à un groupe.
    public function printPoules()
    {

        ini_set('memory_limit', '1536M');
        set_time_limit(1000);
        $this->viewBuilder()->template('print_poules');
        $this->response->type('application/pdf');

        # Récupération de la liste des affectations pour affichage.
        $poulesList = $this->Poules->find('all', [
            'recursive' => 3,
            'contain' =>['Affectations', 'Categories','Affectations.Candidats','Affectations.Candidats.Clubs'],
            'order' => ['pou_idcateg, pou_sexe, pou_poidsmin' => 'ASC']
        ]);


        // Récupération de la catégorie sélectionnée.
        if ($this->request->is(['get'])) {
            if (isset($this->request->query['categorie'])) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $categId = $this->request->query['categorie'];
                $poulesList->where(['pou_idcateg' => $categId]);
            } else {
                $categId = "";
            }
        }

        $this->set('poulesList', $poulesList);

        $this->loadModel('Challenges');
        $challenge = $this->Challenges->get(1);

        $this->set('challenge', $challenge);

        $this->set('categId', $categId);

        $this->viewBuilder()
            ->className('Dompdf.Pdf')
            ->layout('pdf/default')
            ->options(['config' => [
                'filename' => 'Test.pdf',
                'render' => 'browser',
                'orientation' => 'landscape',
            ]]);

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

        //debug($this->request);
        if ($this->request->is(['get'])) {
            if (isset($this->request->query['categorie']) && $this->request->query['categorie'] != -1) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $categId = $this->request->query['categorie'];
                $poulesList->where(['pou_idcateg' => $categId]);
            } else {
                $categId = -1;
            }
            if (isset($this->request->query['sexe']) && $this->request->query['sexe'] != "") {
                //debug("Categorie = ".$this->request->query['categorie']);
                $sexe = $this->request->query['sexe'];
                $poulesList->where(['pou_sexe' => $sexe]);
            } else {
                $sexe = -1;
            }
            if (isset($this->request->query['poidsMin']) && $this->request->query['poidsMin'] != 0) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $pMin = $this->request->query['poidsMin'];
                $poulesList->where(['pou_poidsmin' => $pMin]);
            } else {
                $pMin = 0;
            }
        }
        $this->set('sexeId', $sexe);
        $this->set('pMin', $pMin);
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

        // Recherche des informations de la catégorie.
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        if ($categId != -1) {
            $categories->where(['id' => $categId]);
            $categorie = $categories->first();
            $this->set('categorie', $categorie);
        }

        $this->set('poulesList', $poulesList);

        // Pour la liste des catégories.
        $listCateg = $this->Categories->find('list', [
            'keyField' => 'id',
            'valueField' => function ($category) {
                return $category->get('Label');
            },
            'order' => 'cat_nom ASC'
        ]);

        $data = $listCateg->toArray();
        $this->set('listCateg', $data);

    } 



    // Sauvegarde des modifications sur les poules.
    public function updatePoules()
    {

        // Récupération des données su les poules.
        if ($this->request->is(['post'])) {
            $connexion = $this->request->input('json_decode');
            $this->log($connexion, 'debug');

            $this->log("Modification des poules", 'debug');
            
            $idPoule = $connexion->to;
            $idAffectation = $connexion->from;

            $this->log("idPoule = ".$idPoule, 'debug');
            $this->log("idAffectation = ".$idAffectation, 'debug');

            $this->loadModel('Affectations');
            $affectation = $this->Affectations->get($idAffectation);
            $affectation->aff_idpoule = $idPoule;

            if ($this->Affectations->save($affectation)) {
                $this->Flash->success(__("Le candidat a été réaffecté."));
                return $this->redirect(['action' => 'groupComposition']);
            }
            
        }

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
        $this->viewBuilder()->template('groups');


        // Récupération de la catégorie sélectionnée.
        if ($this->request->is(['get'])) {
            if (isset($this->request->query['categorie'])) {
                //debug("Categorie = ".$this->request->query['categorie']);
                $categId = $this->request->query['categorie'];
            } else {
                $categId = "";
            }
        }

        // Recherche de la liste des candidats non affectés à une poule.
        $subquery = $this->Poules->Affectations->find()
        ->select(['Affectations.aff_idcandidat']);

        $candidats = $this->Poules->Affectations->Candidats->find()
        ->where([
            'id NOT IN' => $subquery,
            'left(can_clef, 1) =' => $categId])
        ->order(['can_clef']);
        //$this->log("Liste des candidats non affectés: ".$this->request);

        //$nbCandidats = 0;   // Nombre de candidats dans la poule courante.
        $maxCandidats = 4;    // Nombre max de candidats par poule.
        $maxEcartPoids = 3;   // Ecart max de poids entre le plus léger et le plus lourd dans la poule.
        $maxMemeClub = 1;     // Nombre max de candidat du même club dans la même poule.
        $poidsMin    = -1;    // Initialisation du poids min utilisé pour la création des poules.
        //$idPoule = -1;      // Id de la poule courante.

        $idCateg = -1;


        $this->log("Boucle sur les candidats: ".$candidats->count());
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

    
            // Recherche des informations de la catégorie.
            $this->loadModel('Categories');
            $categorie = $this->Categories->get($idCateg);

            if ($categorie->cat_mode == 'FFJDA') {

                $this->log("Mode FFJDA");
                $range = $this->Poules->getWeightRange($candidat->can_poids, $candidat->can_sexe);
                $maxEcartPoids = $range["gigue"];
                $poidsMin = $range["poidsMin"];

            } else {

                // Type Morpho, le poids min de la poule est le poids du premier candidat
                // de la poule.
                $this->log("Mode Morpho");
                $poidsMin = $candidat->can_poids;
            }

            $this->log("Poids min = ".$poidsMin);
            $this->log("Gigue = ".$maxEcartPoids);

            // Recherche d'une poule compatible pour le candidat (MORPHO).
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
                //$poule->pou_poidsmin = $candidat->can_poids;
                $poule->pou_poidsmin = $poidsMin;

                if ($this->Poules->save($poule)) {
                    $this->log("Création de la nouvelle poule réussie :".$poule->id);
                    $idPoule = $poule->id;
                }
            }


            # Si la poule a bien été créée ou récupérée.
            if (isset($idPoule) && $idPoule != -1) {

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


        $this->redirect([
            'contoller' => 'Poules',
            'action' => 'groupComposition',
            '?' => ['categorie' => $idCateg]
        ]);

    }
    


    public function view($id)
    {
        $poule = $this->Poules->get($id);
        $this->set(compact('poule'));
    }
 

    public function deletePoule() {

        $node = $this->request->input('json_decode');
        $this->log($node, 'debug');

        $idPoule = $node->nodes[0];
        $this->log("Suppression de la poule ".$idPoule, 'debug');
        
        // Chargement de la poule à supprimer.
        $poule = $this->Poules->get($idPoule);
        $this->log("Chargement poule ".$poule->id, 'debug');

        // Suppresion de la poule.
        if ($this->Poules->delete($poule)) {
            $this->Flash->success(__("La poule a été supprimée."));
            return $this->redirect(['action' => 'groupComposition']);
        }

    }


    // Suppression d'une poule.
    public function delete($id)
    {

        $this->log("Demande de suppression de la poule ".$id, 'debug');

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