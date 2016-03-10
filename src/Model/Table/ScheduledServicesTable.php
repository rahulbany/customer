<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class ScheduledServicesTable extends Table
{
	 public function initialize(array $config)
		{
			$this->primaryKey('id');
			$this->table('scheduled_service');
			
			$this->belongsTo('CustomerProperty', [
				'className' => 'customer_property',
				'foreignKey' => 'customer_id',		
			]);
			
			$this->hasOne('Customer', [
				'className' => 'customers',
				'foreignKey' => 'id',		
			]);
		
			$this->hasMany('Addresses', [
				'foreignKey' => 'user_id'
			]);
			
			$this->belongsTo('PartnerProvidedServices', [
				'className' => 'PartnerProvidedServices',
				'foreignKey' => 'pp_services_id',		
			]);
		}
}
