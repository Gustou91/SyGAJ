<?php
namespace App\Controller;
use App\Controller\AppController;

class MainController extends AppController {
	
	public function index(){
		
		//echo("<p>");
		$this->log("MainController - index()", "debug");

		/*$loggeduser = $this->request->session()->read('Auth.User');
		if(!$loggeduser) {
		    $userID = $loggeduser['id'];
		    $firstName = $loggeduser['first_name'];
			$this->log("MainController - index(): user = ".$firstName, "debug");
			debug($firstName);
		} else {
			$this->log("MainController - index(): user = null", "debug");
		}

		//debug($this->Auth->user('id'));
		die();*/


	}


    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action

        // Par défaut refuser
        return true;
    }

}
?>