<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ClubsController extends AppController
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



    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action
        if (isset($user['role']) 
            && ($user['role'] === 'admin'
            || $user['role'] === 'user'
            || $user['role'] ===  'challenge_master'
        )) {
            return true;
        }

        // Par défaut refuser
        return false;
    }



    // Liste des clubs.
    public function index()
    {


        $clubs = $this->Clubs->find('all', ['contain' =>['Villes']]);

        $this->set('clubs', $clubs);
        

    }

    
    public function view($id)
    {
        $club = $this->Clubs->get($id);
        $this->set(compact('club'));
    }
 

    // Edition d'un club.
    public function edit($id = null)
    {
        $club = $this->Clubs->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__("Le club a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le club."));
        }

        $this->set('club', $club);


        // Pour la liste des villes dans le SELECT.
        $this->loadModel('Villes');
        $villes = $this->Villes->find('list', [
            'keyField' => 'id',
            'valueField' => function ($ville) {
                return $ville->get('Label');
            },
            'conditions' => 'vil_active = 1',
            'order' => 'vil_nom ASC'
        ]);

        $data = $villes->toArray();
        $this->set('villes', $data);

    }


    // Ajout d'un club.
    public function add()
    {
        $club = $this->Clubs->newEntity();
        if ($this->request->is('post')) {
 
            $club = $this->Clubs->patchEntity($club, $this->request->data, ['validate' => true]);


            if ($this->Clubs->save($club)) {
                $this->Flash->success(__("Le club a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le club."));
        }
        $this->set('club', $club);


        // Pour la liste des villes dans le SELECT.
        $this->loadModel('Villes');
        $villes = $this->Villes->find('list', [
            'keyField' => 'id',
            'valueField' => function ($ville) {
                return $ville->get('Label');
            },
            'conditions' => 'vil_active = 1',
            'order' => 'vil_nom ASC'
        ]);

        $data = $villes->toArray();
        $this->set('villes', $data);
      
    }




    // Suppression d'un club.
    public function delete($id)
    {
        // Chargement du club à supprimer.
        $club = $this->Clubs->get($id);

        // Suppresion du club.
        $this->Clubs->delete($club);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Clubs',
            'action' => 'index'));
    }
}