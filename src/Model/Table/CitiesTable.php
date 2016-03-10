<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class CitiesTable extends Table
{

	public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		$this->belongsTo('States', [
            'className' => 'States',
            'foreignKey' => 'state_id'
        ]);
    }
	
	public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('city', 'Title is required')
            ->notEmpty('slug', 'Slug is required')
            ->notEmpty('state_id', 'state is required')
            ->notEmpty('content', 'Content is required')
            ->notEmpty('seo_title', 'SEO title is required')
            ->notEmpty('seo_content', 'SEO content  is required');
    }
	
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['slug']));
		return $rules;
	}

	

}
