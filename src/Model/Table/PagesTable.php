<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class PagesTable extends Table
{

	public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	
	public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('title', 'Title is required')
            ->notEmpty('slug', 'Title is required')
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
