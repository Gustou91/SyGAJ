<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ChallengesController extends AppController
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


    // Liste des challenges.
    public function index()
    {


        $challenges = $this->Challenges->find('all');

        $this->set('challenges', $challenges);
        

    }

    
    public function view($id)
    {
        $challenge = $this->Challenges->get($id);
        $this->set(compact('challenge'));
    }
 

    // Edition d'un challenge.
    public function edit($id = null)
    {
        $challenge = $this->Challenges->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Challenges->patchEntity($challenge, $this->request->data);
            if ($this->Challenges->save($challenge)) {
                $this->Flash->success(__("Le challenge a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le challenge."));
        }

        $this->set('challenge', $challenge);

    }


    // Ajout d'un challenge.
    public function add()
    {
        $challenge = $this->Challenges->newEntity();
        if ($this->request->is('post')) {
 
            $challenge = $this->Challenges->patchEntity($challenge, $this->request->data, ['validate' => true]);


            if ($this->Challenges->save($challenge)) {
                $this->Flash->success(__("Le challenge a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le challenge."));
        }
        $this->set('challenge', $challenge);

      
    }




    // Suppression d'un challenge.
    public function delete($id)
    {
        // Chargement du challenge à supprimer.
        $challenge = $this->Challenges->get($id);

        // Suppresion du challenge.
        $this->Challenges->delete($challenge);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Challenges',
            'action' => 'index'));
    }
}