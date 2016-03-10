<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CreditCardsTable extends Table
{
	 public function initialize(array $config)
		{
			$this->primaryKey('id');
			$this->table('credit_cards');
			//$this->table('partners');
			  $this->belongsTo('Users', [
				'foreignKey' => 'user_id',
			]);	
	} 
}