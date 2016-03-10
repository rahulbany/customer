<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class DashboardController extends AppController
{	
	
	public function index() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Dashboard';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$loguser = $this->request->session()->read('Auth.User');
		
		$id = $loguser['id'];
		$userTable = TableRegistry::get('Users');
		$userInfo = $userTable->get($id,['contain' => ['Addresses'=>['StateList','Yards']]]);
		
		$customerTables = TableRegistry::get('Customers');	
		$user_ID = $this->Auth->user('id');
		$customerTables = TableRegistry::get('Customers');
		$getData = $customerTables->find()->where(['user_id'=>$user_ID])->first();
		$getCustomerID = $getData->id;  
		
		$credit_cardsTable 	= TableRegistry::get('CreditCards');
		$credit_cardsInfo = $credit_cardsTable->find()->where(['user_id'=>$user_ID])->first();
		 
		//debug ($userInfo);die;
		$connection = ConnectionManager::get('default');
		$connection = ConnectionManager::get('default');
			$results = $connection->execute('SELECT 
			  PartnerProvidedServices.service AS `ScheduledServices__service_name`, 
			  PartnerProvidedServices.job_type AS `ScheduledServices__job_type`, 
			  ScheduledServices.id AS `ScheduledServices__id`, 
			  ScheduledServices.customer_id AS `ScheduledServices__customer_id`, 
			  ScheduledServices.pp_services_id AS `ScheduledServices__pp_services_id`, 
			  ScheduledServices.frequency_customer_id AS `ScheduledServices__frequency_customer_id`, 
			  ScheduledServices.discount_code AS `ScheduledServices__discount_code`, 
			  ScheduledServices.paid_card_id AS `ScheduledServices__paid_card_id`, 
			  ScheduledServices.tip AS `ScheduledServices__tip`, 
			  ScheduledServices.payable_money AS `ScheduledServices__payable_money`, 
			  ScheduledServices.is_done AS `ScheduledServices__is_done`, 
			  ScheduledServices.created_at AS `ScheduledServices__created_at`, 
			  CustomerPropertys.id AS `CustomerPropertys__id`, 
			  CustomerPropertys.customer_id AS `CustomerPropertys__customer_id`, 
			  CustomerPropertys.scheduled_service_id AS `CustomerPropertys__scheduled_service_id`, 
			  CustomerPropertys.`street-address` AS `CustomerPropertys__street_address`, 
			  Users.id AS `Users__id`, 
			  Users.first_name AS `Users__first_name`, 
			  Users.last_name AS `Users__last_name`, 
			  Users.login_name AS `Users__login_name`, 
			  Users.email AS `Users__email`, 
			  Users.password AS `Users__password`, 
			  Users.user_type AS `Users__user_type`, 
			  Users.referal_code AS `Users__referal_code`, 
			  Users.profile_image AS `Users__profile_image`, 
			  Users.mobile_no AS `Users__mobile_no`, 
			  Users.remember_token AS `Users__remember_token`, 
			  Users.created_at AS `Users__created_at`, 
			  Users.updated_at AS `Users__updated_at`, 
			  Users.token AS `Users__token` 
			FROM 
			  scheduled_service ScheduledServices 
			  LEFT JOIN customer_property CustomerPropertys ON ScheduledServices.id = (
				CustomerPropertys.scheduled_service_id
			  ) 
			  LEFT JOIN partner_provided_services PartnerProvidedServices ON ScheduledServices.pp_services_id = (
				PartnerProvidedServices.id
			  ) 
			  LEFT JOIN customers Customers ON Customers.id = (CustomerPropertys.customer_id) 
			  LEFT JOIN users Users ON Users.id = (Customers.user_id) 
			WHERE 
			ScheduledServices.customer_id = " '.$getCustomerID.' "
			order by ScheduledServices.id desc
			limit 1')->fetchAll('assoc'); 
		//debug ($credit_cardsInfo);die;		
		$this->set('bookingList',$results); 
		$this->set('userInfo',$userInfo);	
		$this->set('credit_cardsInfo',$credit_cardsInfo);	
	}

}
