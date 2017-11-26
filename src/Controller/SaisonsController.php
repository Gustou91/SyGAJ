<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class SaisonsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action
        if (isset($user['role']) 
            && ($user['role'] === 'admin'
        )) {
            return true;
        }

        // Par défaut refuser
        return false;
    }



     public function index()
     {
        $saisons = $this->Saisons->find('all');
        $this->set('saisons', $this->Saisons->find('all', array(
            'order' => array('Saisons.sai_nom' => 'asc'))));

    }

    
    public function view($id)
    {
        $saisons = $this->Saisons->get($id);
        $this->set(compact('saison'));
    }

    
    public function edit($id = null)
    {
        $saison = $this->Saisons->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Saisons->patchEntity($saison, $this->request->data);
            if ($this->Saisons->save($saison)) {
                $this->Flash->success(__('La saison a été sauvegardée.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer la saison."));
        }

        $this->set('saison', $saison);

    }

    // Ajout d'une saison.
    public function add()
    {
        
        $saison = $this->Saisons->newEntity();
        if ($this->request->is('post')) {
 
            $saison = $this->Saisons->patchEntity($saison, $this->request->data, ['validate' => true]);


            if ($this->Saisons->save($saison)) {
                $this->Flash->success(__("La saison a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter la saison."));
        }
        $this->set('saison', $saison);

    }


    // Suppression d'une saison.
    public function delete($id)
    {
        // Chargement de la saison à supprimer.
        $saison = $this->Saisons->get($id);
        // Suppresion de la saison.
        $this->Saisons->delete($saison);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Saisons',
            'action' => 'index'));
    }

}