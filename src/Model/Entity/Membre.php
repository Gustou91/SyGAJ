<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Membre extends Entity
{



    protected function _getLabel()
    {
    	return $this->_properties['mem_nom'] . ' ' . $this->_properties['mem_prenom'];
    }

}