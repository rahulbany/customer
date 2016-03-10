<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PartnerProvidedServicesTable extends Table
{
	 
	  public function initialize(array $config) {
		$this->table('partner_provided_services');
		
		 $this->hasMany('ScheduledServicesTable',[
            'foreignKey' => 'pp_service_id'
           // 'dependent' => false,
        ]); 
	}

}