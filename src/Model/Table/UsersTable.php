<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	 public function initialize(array $config)
		{
			$this->primaryKey('id');
			
			$this->hasOne('Customers', [
				'foreignKey' => 'user_id',
				'dependent' => true
			]);
			
			$this->hasMany('Addresses', [
				'className' => 'Addresses',
				'dependent' => true
			]);
			
			$this->belongsTo('Address', [
				'className' => 'Addresses',
				'dependent' => true
			]);

		
	} 
	


	public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('login_name', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }
}