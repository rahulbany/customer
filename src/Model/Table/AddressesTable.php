<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AddressesTable extends Table
{
	 
	  public function initialize(array $config)
		{
			$this->table('address');
			
			/* $this->belongsTo('Users', [
				'foreignKey' => 'user_id',
				'joinType' => 'INNER',
			]); */
			$this->belongsTo('StateList', [
				'foreignKey' => 'state_id',
			]);	
			
			$this->belongsTo('Yards', [
				'foreignKey' => 'size',
			]);	
		
		} 
}