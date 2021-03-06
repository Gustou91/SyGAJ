<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['logout']);
    }

     public function index()
     {
        $users = $this->Users->find('all');
        $this->set('users', $this->Users->find('all'));
        //$this->set(compact('users'));
/*        debug($users);
        die();*/
    }

    
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
           $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'enregistrer l'utilisateur."));
        }

        $this->set('user', $user);

    }


    // Ajout d'un utilisateur.
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
 
            $user = $this->Users->patchEntity($user, $this->request->data);
            debug($user);
            debug($this->Users);

            if ($this->Users->save($user)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
        }
        $this->set('user', $user);
    }


    // Suppression d'un utilisateur.
    public function delete($id)
    {
        // Chargement de l'uilisateur à supprimer.
        $user = $this->Users->get($id);
        // Suppresion de l'utilisateur.
        $this->Users->delete($user);

        // Redirection vers index.
        $this->redirect(array(
            'contoller' => 'Users',
            'action' => 'index'));
    }

    /* Overtue session */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    /* Fermeture session */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}