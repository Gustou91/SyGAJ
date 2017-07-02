<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class InscriptionsController extends AppController
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



    public function index()
    {


        $inscriptions = $this->Inscriptions->find('all', ['contain' =>['Cours', 'Membres', 'Saisons']]);
        //debug($inscriptions);
        //die();
        $this->set('inscriptions', $inscriptions);
        

    }

    
    public function view($id)
    {
        $inscriptions = $this->Inscriptions->get($id);
        $this->set(compact('membre'));
    }
 

    public function edit($id = null)
    {
        $inscription = $this->Inscriptions->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Inscriptions->patchEntity($inscription, $this->request->data);
            if ($this->Inscriptions->save($inscription)) {
                $this->Flash->success(__("L'inscription a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer l'inscription."));
        }

        $this->set('inscription', $inscription);

    }


    // Ajout d'un membre.
    public function add()
    {
        $inscription = $this->Inscriptions->newEntity();
        if ($this->request->is('post')) {
 
            $inscription = $this->Inscriptions->patchEntity($inscription, $this->request->data, ['validate' => true, 'associated' => ['Cours', 'Membres', 'Saisons']]);


            if ($this->Inscriptions->save($inscription)) {
                $this->Flash->success(__("L'inscription a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'inscription."));
        }
        $this->set('inscription', $inscription);


        // Pour la liste des membres dans le SELECT.
        $this->loadModel('Membres');
        $membres = $this->Membres->find('list', [
            'keyField' => 'id',
            'valueField' => function ($membre) {
                return $membre->get('Label');
            },
            'order' => 'mem_nom, mem_prenom ASC'
        ]);

        $data = $membres->toArray();
        $this->set('membres', $data);


        // Pour la liste des cours dans le SELECT.
        $this->loadModel('Cours');
        $cours = $this->Cours->find('list', [
            'keyField' => 'id',
            'valueField' => 'cou_nom'
        ]);

        $data = $cours->toArray();
        $this->set('cours', $data);


        // Pour la saison active.
        $this->loadModel('Saisons');
        $saison = $this->Saisons->find('all', [
            'conditions' => 'sai_active = 1'
        ]);

        $data = $saison->first();
        $activeSaison = $data->sai_nom;
        $this->set('saison', $data->sai_nom);


        // Pour la liste des articles.
        $this->loadModel('Articles');
        $articles = $this->Articles->find('list', [
            'keyField' => 'id',
            'valueField' => 'art_nom'
        ]);


        $data = $articles->toArray();
        $this->set('articles', $data);  

        
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


   
    public function find($id = null)
    {
        $this->log("Début controller find.");
        $this->loadModel('Membres');
        $this->log($this->request);

        //$membre = $this->Membres->get($id);

        if ($this->request->is(['post', 'put'])) {

            //$membre = $this->Membres->newEntity();
            //$membre = $this->Membres->patchEntity($membre, $this->request->data);

            $this->log("Donnée: ".$this->request->data('id'));
            $memId = $this->request->data('id');
            $membre = $this->Membres->get($memId);
            $this->log("Membre: ");
            $this->log($membre);

        }

        $this->set('membre', $membre);
        $this->set('_serialize', ['membre']);

    }


    // Suppression d'un membre.
    public function delete($id)
    {
        // Chargement du membre à supprimer.
        $inscription = $this->Inscriptions->get($id);
        // Suppresion du membre.
        $this->Inscriptions->delete($inscription);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Inscriptions',
            'action' => 'index'));
    }
}