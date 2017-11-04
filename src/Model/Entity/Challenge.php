<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Chalenge extends Entity
{



    protected function _getLabel()
    {
    	return $this->_properties['cha_nom'];
    }

}