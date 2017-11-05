<?php
namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{

	public $components = array('Session', 'Cookie', 'Auth');

	/* Frmulaire d'identification */
	public function index()
    {
        $this->Auth->allow();
    	$this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }


    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action

        // Par défaut refuser
        return true;
    }

    /* Ajout d'un nouvel utilisateur */
    public function add()
    {

    }

    
    public function view()
    {
    	$users = $this->user->find('all');
    	$this->set(compact('users'));
    }

    public function edit()
    {

    }
}