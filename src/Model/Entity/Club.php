<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Club extends Entity
{



    protected function _getLabel()
    {
    	return $this->_properties['clu_nom'];
    }

}