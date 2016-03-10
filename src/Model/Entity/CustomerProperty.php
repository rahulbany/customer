<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
//echo str_replace("world","Peter","Hello world!");
class CustomerProperty extends Entity
{
	 //$name = ['street-address'];
	 //chop($str,"World!");
  protected $_virtual = ['street-address'];
  //protected $_virtual =  str_replace("-","_",$_virtual);

}

?>