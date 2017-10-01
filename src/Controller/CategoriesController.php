<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class CategoriesController extends AppController
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


    // Liste des categories.
    public function index()
    {


        $categories = $this->Categories->find('all');

        $this->set('categories', $categories);
        

    }

    
    public function view($id)
    {
        $categories = $this->Categories->get($id);
        $this->set(compact('categories'));
    }
 

    // Edition d'une categorie.
    public function edit($id = null)
    {
        $categorie = $this->Categories->get($id);

        if ($this->request->is(['post', 'put'])) {
           $this->Categories->patchEntity($categorie, $this->request->data);
            if ($this->Categories->save($categorie)) {
                $this->Flash->success(__("La categorie a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer la categorie."));
        }

        $this->set('categorie', $categorie);


        $this->set('titre', 'Modifier une catégorie');
        $this->set('bouton', 'Enregistrer');

    }


    // Ajout d'une categorie.
    public function add()
    {
        $categorie = $this->Categories->newEntity();
        if ($this->request->is('post')) {
 
            $categorie = $this->Categories->patchEntity($categorie, $this->request->data, ['validate' => true]);


            if ($this->Categories->save($categorie)) {
                $this->Flash->success(__("La categorie a été sauvegardée."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter la categorie."));
        }
        $this->set('categorie', $categorie);


        $this->set('titre', 'Ajouter une catégorie');
        $this->set('bouton', 'Ajouter');
      
        $this->render('edit');

    }




    // Suppression d'une categorie.
    public function delete($id)
    {
        // Chargement de la catégorie à supprimer.
        $categorie = $this->Categories->get($id);

        // Suppresion de la catégorie.
        $this->Categories->delete($categorie);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Categories',
            'action' => 'index'));
    }
}