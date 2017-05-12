<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ArticlesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }


     public function index()
     {
        $articles = $this->Articles->find('all');
        $this->set('articles', $this->Articles->find('all', array(
            'order' => array('Articles.art_nom' => 'asc'))));

    }

    
    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__("L'article a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer l'article."));
        }

        $this->set('article', $article);

    }


    // Ajout d'un article.
    public function add()
    {
        
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
 
            $article = $this->Articles->patchEntity($article, $this->request->data, ['validate' => true]);


            if ($this->Articles->save($article)) {
                $this->Flash->success(__("L'article a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'article."));
        }
        $this->set('article', $article);

    }


    // Suppression d'un article.
    public function delete($id)
    {
        // Chargement de l'article à supprimer.
        $articles = $this->Articles->get($id);
        // Suppression de l'article.
        $this->Articles->delete($articles);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Articles',
            'action' => 'index'));
    }

}