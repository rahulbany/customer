<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
//ServiceRatingTable.php
class ServiceRatingTable extends Table
{
//public $useTable = 'scheduled_service';
	 public function initialize(array $config)
		{
			$this->table('service_rating');
			/* $this->belongsTo('PartnerServiceScheduling', [
            'foreignKey' => 'pass_id'
           // 'dependent' => false,
        ]);		 */
	}
}
