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
        ->where(['id NOT IN' => $subquery]);

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