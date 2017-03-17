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
        $membres = $this->Membres->find('all');
        $this->set('membres', $this->Membres->find('all'));
        //$this->set(compact('users'));
/*        debug($users);
        die();*/
    }

    
    public function view($id)
    {
        $membres = $this->Membres->get($id);
        $this->set(compact('membre'));
    }


    // Ajout d'un utilisateur.
    public function add()
    {
        $membre = $this->Membres->newEntity();
        if ($this->request->is('post')) {
 
            $membre = $this->Membres->patchEntity($membre, $this->request->data);
            debug($membre);
            debug($this->Membres);

            if ($this->Membres->save($membre)) {
                $this->Flash->success(__("Le membre a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le membre."));
        }
        $this->set('membre', $membre);
    }


    // Suppression d'un utilisateur.
    public function delete($id)
    {
        // Chargement de l'uilisateur à supprimer.
        $membre = $this->Membres->get($id);
        // Suppresion de l'utilisateur.
        $this->Membres->delete($membre);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Membres',
            'action' => 'index'));
    }

}