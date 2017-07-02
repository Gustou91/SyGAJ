<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Ville extends Entity
{



    protected function _getLabel()
    {
    	return $this->_properties['vil_nom'] . ' (' . $this->_properties['vil_cp'].')';
    }

}