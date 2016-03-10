<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class ContactsTable extends Table
{

	public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	
	public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('name', 'Name is required')
            ->notEmpty('email', 'Email is required')
            ->notEmpty('city', 'City is required');
    }
	
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['email']));
		return $rules;
	}

}
