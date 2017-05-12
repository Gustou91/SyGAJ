<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ReductionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


     public function index()
     {
        $reductions = $this->Reductions->find('all');
        $this->set('reductions', $this->Reductions->find('all', array(
            'order' => array('Reductions.red_nom' => 'asc'))));

    }

    
    public function edit($id = null)
    {
        $reduction = $this->Reductions->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Reductions->patchEntity($reduction, $this->request->data);
            if ($this->Reductions->save($reduction)) {
                $this->Flash->success(__("La réduction a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer la réduction."));
        }

        $this->set('reduction', $reduction);

    }


    // Ajout d'une réduction.
    public function add()
    {
        
        $reduction = $this->Reductions->newEntity();
        if ($this->request->is('post')) {
 
            $reduction = $this->Reductions->patchEntity($reduction, $this->request->data, ['validate' => true]);


            if ($this->Reductions->save($reduction)) {
                $this->Flash->success(__("La réduction a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter la réduction."));
        }
        $this->set('reduction', $reduction);

    }


    // Suppression d'une réduction.
    public function delete($id)
    {
        // Chargement de la réduction à supprimer.
        $reductions = $this->Reductions->get($id);
        // Suppression de la réduction.
        $this->Reductions->delete($reductions);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Reductions',
            'action' => 'index'));
    }

}