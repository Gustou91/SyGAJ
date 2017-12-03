<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LogsController extends AppController
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



    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action
        if (isset($user['role']) 
            && ($user['role'] === 'admin'
        )) {
            return true;
        }

        // Par défaut refuser
        return false;
    }



    // Liste des clubs.
    public function index()
    {


        $logs = $this->Logs->find('all', ['contain' =>['Users']])
                           ->order(['logs.created' => 'DESC']);

        $this->set('logs', $logs);
        

    }

}