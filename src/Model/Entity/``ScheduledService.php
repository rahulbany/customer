<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
//echo str_replace("world","Peter","Hello world!");
class ScheduledService extends Entity
{
	
    protected $_accessible = [
        '*' => true,
        'id' => false,
		'customer_id'=> true,
		'pp_services_id'=> true,
		'frequency_customer_id'=> true
    ];


}

?>