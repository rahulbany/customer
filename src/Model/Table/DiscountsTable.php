<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class DiscountsTable extends Table
{
	 public function initialize(array $config)
		{
			$this->table('discount');
		}
}
