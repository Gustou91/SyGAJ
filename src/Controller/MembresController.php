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

            //$this->Membres->patchEntity($membre, $this->request->data);
            $this->Membres->patchEntity($membre, $this->request->data, ['validate' => true, 'associated' => ['Villes']]);

            if ($this->Membres->save($membre)) {
                $this->Flash->success(__("Le membre a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le membre."));
        }

        $this->set('membre', $membre);


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




    // Ajout d'un membre.
    public function add()
    {
        
        $membre = $this->Membres->newEntity();
        if ($this->request->is('post')) {
 
            //$membre = $this->Membres->patchEntity($membre, $this->request->data, ['validate' => true]);
            $membre = $this->Membres->patchEntity($membre, $this->request->data, ['validate' => true, 'associated' => ['Villes']]);


            if ($this->Membres->save($membre)) {
                $this->Flash->success(__("Le membre a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le membre."));
        }
        $this->set('membre', $membre);


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