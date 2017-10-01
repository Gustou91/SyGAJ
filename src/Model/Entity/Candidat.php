<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Candidat extends Entity
{

    protected function _getLabel()
    {
    	return $this->_properties['can_nom'] . ' (' . $this->_properties['can_prenom'].')';
    }

}