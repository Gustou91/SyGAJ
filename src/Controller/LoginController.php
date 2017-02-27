<?php
namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{

	public $components = array('Session', 'Cookie', 'Auth');

	public function index()
    {
    	$this->viewBuilder()->layout('login');
    }

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