<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class MembresController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }

    public function index()
    {
        debug($this);
        debug($this->Membres);
        die();

        $membres = $this->Membres->find('all');
        $this->set('membres', $membres);

    }

    
    public function view($id)
    {
        $membres = $this->Membres->get($id);
        $this->set(compact('membre'));
    }

    
    public function edit($id = null)
    {
        $membre = $this->Membres->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Membres->patchEntity($membre, $this->request->data);
            if ($this->Membres->save($membre)) {
                $this->Flash->success(__("Le membre a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le membre."));
        }

        $this->set('membre', $membre);

    }

    // Ajout d'un membre.
    public function add()
    {
        
        $membre = $this->Membres->newEntity();
        if ($this->request->is('post')) {
 
            $membre = $this->Membres->patchEntity($membre, $this->request->data, ['validate' => true]);


            if ($this->Membres->save($membre)) {
                $this->Flash->success(__("Le membre a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le membre."));
        }
        $this->set('membre', $membre);

    }


    // Suppression d'un membre.
    public function delete($id)
    {
        // Chargement du membre à supprimer.
        $membre = $this->Membres->get($id);
        // Suppresion du membre.
        $this->Membres->delete($membre);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Membres',
            'action' => 'index'));
    }

}