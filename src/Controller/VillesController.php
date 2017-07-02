<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class VillesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


     public function index()
     {
        $villes = $this->Villes->find('all');
        $this->set('villes', $this->Villes->find('all', array(
            'order' => array('villes.vil_nom' => 'asc'))));
    }

    
    public function view($id)
    {
        $villes = $this->Villes->get($id);
        $this->set(compact('ville'));
    }

    
    public function edit($id = null)
    {
        $ville = $this->Villes->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Villes->patchEntity($ville, $this->request->data);
            if ($this->Villes->save($ville)) {
                $this->Flash->success(__('La ville a été sauvegardée.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer la ville."));
        }

        $this->set('ville', $ville);

    }

    // Ajout d'une ville.
    public function add()
    {
        
        $ville = $this->Villes->newEntity();
        if ($this->request->is('post')) {
 
            $ville = $this->Villes->patchEntity($ville, $this->request->data, ['validate' => true]);


            if ($this->Villes->save($ville)) {
                $this->Flash->success(__("La ville a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter la ville."));
        }
        $this->set('ville', $ville);

    }


    // Suppression d'une ville.
    public function delete($id)
    {
        // Chargement de la ville à supprimer.
        $ville = $this->Villes->get($id);
        // Suppresion de la ville.
        $this->Villes->delete($ville);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Villes',
            'action' => 'index'));
    }

}