<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;

class PartnerServiceSchedulingsTable extends Table
{
//public $useTable = 'partner_service_scheduling';

	 public function initialize(array $config)
	{
			$this->table('partner_service_scheduling');
		/* 	$this->belongsTo('ScheduledServices', [
            'foreignKey' => 'scheduled_service_id',
        //    'joinType' => 'INNER',
        ]); */
		
	/* 	$this->hasMany('ServiceRating', [
            'foreignKey' => 'pss_id'
           // 'dependent' => false,
        ]); */

	}
}
