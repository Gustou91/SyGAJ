<?php
namespace App\Controller;
use App\Controller\AppController;

class MainController extends AppController {
	
	public function index(){
		
		//echo("<p>");
	}


    public function isAuthorized($user) {
        // Admin peuvent accéder à chaque action

        // Par défaut refuser
        return true;
    }

}
?>