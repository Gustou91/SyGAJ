<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CandidatsController extends AppController
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


    // Liste des candidats.
    public function index()
    {


        $candidats = $this->Candidats->find('all', ['contain' =>['Clubs']]);

        $this->set('candidats', $candidats);
        

    }

    
    public function view($id)
    {
        $candidats = $this->Candidats->get($id);
        $this->set(compact('candidats'));
    }
 

    // Edition d'un candidat.
    public function edit($id = null)
    {
        $candidat = $this->Candidats->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Candidats->patchEntity($candidat, $this->request->data);
            if ($this->Candidats->save($candidat)) {
                $this->Flash->success(__("Le candidat a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le candidat."));
        }

        $this->set('candidat', $candidat);


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


        // Pour la liste des clubs dans le SELECT.
        $this->loadModel('Clubs');
        $clubs = $this->Clubs->find('list', [
            'keyField' => 'id',
            'valueField' => function ($club) {
                return $club->get('Label');
            },
            'order' => 'clu_nom ASC'
        ]);

        $data = $clubs->toArray();
        $this->set('clubs', $data);


        $this->set('titre', 'Modifier un candidat');
        $this->set('bouton', 'Enregistrer');

    }


    // Ajout d'un candidat.
    public function add()
    {
        $candidat = $this->Candidats->newEntity();
        if ($this->request->is('post')) {
 
            $candidat = $this->Candidats->patchEntity($candidat, $this->request->data, ['validate' => true]);


            if ($this->Candidats->save($candidat)) {
                $this->Flash->success(__("Le candidat a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le candidat."));
        }
        $this->set('candidat', $candidat);


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


        // Pour la liste des clubs dans le SELECT.
        $this->loadModel('Clubs');
        $clubs = $this->Clubs->find('list', [
            'keyField' => 'id',
            'valueField' => function ($club) {
                return $club->get('Label');
            },
            'order' => 'clu_nom ASC'
        ]);

        $data = $clubs->toArray();
        $this->set('clubs', $data);

        $this->set('titre', 'Ajouter un candidat');
        $this->set('bouton', 'Ajouter');
      
        $this->render('edit');

    }




    // Suppression d'un candidat.
    public function delete($id)
    {
        // Chargement du candidat à supprimer.
        $candidat = $this->Candidats->get($id);

        // Suppresion du candidat.
        $this->Candidats->delete($candidat);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Candidats',
            'action' => 'index'));
    }
}