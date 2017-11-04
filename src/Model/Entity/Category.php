<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity
{

    protected function _getLabel()
    {
    	return $this->_properties['cat_nom']."(".$this->_properties['cat_adeb']."-".$this->_properties['cat_afin'].")";
    }

}