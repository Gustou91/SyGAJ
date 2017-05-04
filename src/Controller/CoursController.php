<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CoursController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


     public function index()
     {
        $cours = $this->Cours->find('all');
        $this->set('cours', $this->Cours->find('all', array(
            'order' => array('Cours.cou_nom' => 'asc'))));

    }

    
    public function edit($id = null)
    {
        $cours = $this->Cours->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Cours->patchEntity($cours, $this->request->data);
            if ($this->Cours->save($cours)) {
                $this->Flash->success(__('Le cours a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer le cours."));
        }

        $this->set('cours', $cours);

    }


    // Ajout d'un cours.
    public function add()
    {
        
        $cours = $this->Cours->newEntity();
        if ($this->request->is('post')) {
 
            $cours = $this->Cours->patchEntity($cours, $this->request->data, ['validate' => true]);


            if ($this->Cours->save($cours)) {
                $this->Flash->success(__("Le cours a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter le cours."));
        }
        $this->set('cours', $cours);

    }


    // Suppression d'un cours.
    public function delete($id)
    {
        // Chargement du cours à supprimer.
        $cours = $this->Cours->get($id);
        // Suppresion du cours.
        $this->Cours->delete($cours);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Cours',
            'action' => 'index'));
    }

}