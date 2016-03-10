<?php
/*
 * Initialize the namespace
 * Starting the controller with method
 */
 
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


class JobsController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
	
	
	public function index() {
		$user_ID = $this->Auth->user('id');
		$customerTables = TableRegistry::get('Customers');
		$getData = $customerTables->find()->where(['user_id'=>$user_ID])->first();
		$getCustomerID = $getData->id;  
		$scheduledServiceTable = TableRegistry::get('ScheduledServices');
		/*$result = $scheduledServiceTable->find('all', [
				//'contain' => ['PartnerServiceSchedulings'=>['Partners'=>['Users']],'CustomerPropertys'=>['Customers'=>['Users']]]
				 'conditions' => ['ScheduledServices.customer_id'=>3],
				'contain' => ([
					'PartnerProvidedServices',
					'CustomerProperty'=>function ($q) {
						return $q
							->select(['id','customer_id','scheduled_service_id','house_no','zip','city','state_id','image_url','created_at'])
							->autoFields(false);
					},
					'Customer'=>['Users'],
					
				])
				//'limit' => 3
		]);*/
		//debug($result->toArray());die;
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
			  ScheduledServices.updated_at AS `ScheduledServices__updated_at`, 
			  ScheduledServices.status AS `ScheduledServices__status`, 
			  CustomerPropertys.id AS `CustomerPropertys__id`, 
			  CustomerPropertys.customer_id AS `CustomerPropertys__customer_id`, 
			  CustomerPropertys.scheduled_service_id AS `CustomerPropertys__scheduled_service_id`, 
			  CustomerPropertys.house_no AS `CustomerPropertys__house_no`, 
			  CustomerPropertys.`street-address` AS `CustomerPropertys__street_address`, 
			  CustomerPropertys.zip_code AS `CustomerPropertys__zip_code`, 
			  CustomerPropertys.zip AS `CustomerPropertys__zip`, 
			  CustomerPropertys.city AS `CustomerPropertys__city`, 
			  CustomerPropertys.state_id AS `CustomerPropertys__state_id`, 
			  CustomerPropertys.image_url AS `CustomerPropertys__image_url`, 
			  CustomerPropertys.created_at AS `CustomerPropertys__created_at`, 
			  Customers.id AS `Customers__id`, 
			  Customers.user_id AS `Customers__user_id`, 
			  Customers.neighbourhood AS `Customers__neighbourhood`, 
			  Customers.email AS `Customers__email`, 
			  Customers.is_email_verified AS `Customers__is_email_verified`, 
			  Customers.stripe_id AS `Customers__stripe_id`, 
			  Customers.profile_image AS `Customers__profile_image`, 
			  Customers.selected_credit_card_id AS `Customers__selected_credit_card_id`, 
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
			order by ScheduledServices.id desc')->fetchAll('assoc'); 
		$this->set('bookingList',$results);  
		//debug ($results);die;
	}
	
	function get_street_address () {
		// if (empty($this->request->params['requested']))
			// throw new ForbiddenException();
		//echo "ff";die;
		return "gggg";
	}
	
	public function cancleBooking($id=null) {
		if(!empty($id)) {
			 $scheduledServiceTable = TableRegistry::get('ScheduledServices');
			$getData = 	$scheduledServiceTable->get($id);
			$getData->is_done = 'Cancelled';
			if($scheduledServiceTable->save($getData)){
				$this->Flash->success(__('Your Booking has been successfully cancelled'));
				return $this->redirect(['action' => 'index']);
			}
		}
	}
	
	public function activateBooking($id=null) {
		if(!empty($id)) {
			 $scheduledServiceTable = TableRegistry::get('ScheduledServices');
			$getData = 	$scheduledServiceTable->get($id);
			$getData->is_done = 'In Progress';
			if($scheduledServiceTable->save($getData)){
				$this->Flash->success(__('Your Booking has been successfully activated'));
				return $this->redirect(['action' => 'index']);
			}
		}
	}
	
	
	
	
	 
	/****************************************************#
	#	Autogenerate number                                     #
	#  By: T:307 on 05-02-2015                              #
	****************************************************/
	 
	function autogenNumber()
	{
		$id_length = 60;
		$alfa = "abcdefghijklmnopqrstuvwxyz1234567890";
		$token = "";
		for($i = 1; $i < $id_length; $i ++) {
			@$token .= $alfa[rand(1, strlen($alfa))];
		}    
		return $token;
	}
	
	/****************************************************#
	#	Autogenerate password                                 #
	#  By: T:307 on 05-02-2015                              #
	****************************************************/
	 
	function autogenPassword()
	{
		$id_length = 60;
		$alfa = "ab1cd3efghi5jklm7nop8qrst9uvw3xyz";
		$token = "";
		for($i = 1; $i < $id_length; $i ++) {
			@$token .= $alfa[rand(1, strlen($alfa))];
		}    
		return $token;
	}

	
	/****************************************************#
	#	searching data based on the autocomplete #
	#	handled conditional based ajax request       #
	# 	first condtion for autocomplete                      #
	#  second is for autocomplete selected value #
	#  By: T:307 on 05-02-2015                              #
	****************************************************/
	
	public function searchClient() {
		$UsersInfo = TableRegistry::get('Users');
		if(!empty($_REQUEST)){
			$query = array();
			
			if( isset($_REQUEST['term']) && ($_REQUEST['term']!='') ){
				$query = array();
				$query = $UsersInfo->find()->where(['login_name LIKE'=>'%'.$_REQUEST['term'].'%', 'user_type' => 'customer'])->all();	
				$countRows = $query->count();
				if($countRows>0){
					foreach($query as $value){
						$data[]  = $value['login_name'];
					}
					echo json_encode($data);
				}
			}
			
			else if( isset($_REQUEST['first_name'])  && ($_REQUEST['first_name']!='') ){
				$query = $UsersInfo->find('all')->where(['login_name'=>$_REQUEST['first_name']])->contain(['Addresses','Customers']);
				$countRows = $query->count();
				if($countRows>0){
					foreach($query as $value){
							//echo "<pre>"; print_r($value); echo "</pre>";
							$data = array(
								'first_name'=> $value['first_name'],
								'last_name'=> $value['last_name'], 
								'email'=> $value['email'], 
								'street_address'=>$value['address']['street_address'],
								'city'=>$value['address']['city'],
								'state'=>$value['address']['state_id'],
								'zip'=>$value['address']['zip_code'],
								'customer_id'=>$value['customer']['id'],
							);
						echo json_encode($data);
					}
				}
			}
		}
		exit;
	}
	
	
	
	/**************************************************#
	#	Handeling the service drop down 				#
	#	According the service list the 						#
	# extra service list will be updated with the	#
	# checkbox listing    											#
	# By: T:307 on 08-02-2015   				        	#
	****************************************************/
	
	function searchExtraService($id = null)  {
		if (!empty($this->request))  {
			$yard_id =  $this->request->data['yard_id'];  // yards_id
			$getId 	=  $this->request->data['id'];  //  service_id
			
			//$serviceTables 	= TableRegistry::get('PartnerProvidedServices');
			$serviceTables		= TableRegistry::get('ServiceYards');
			$queryService 		= $serviceTables->find()->where(['pp_service_id'=>$getId,'yard_id'=>$yard_id])->first();
			if (!empty($queryService))  {
				$serviceExtraTables = TableRegistry::get('ExtraProvidedServices');
				//$query = $serviceExtraTables->find('all')->where(['pp_service_id'=>$getId]);
				$query 		= $serviceExtraTables->find('all')->where(['pp_service_id'=>$getId]);
				$returnArr 	= array();
				foreach ($query as $findJq) {
					$returnArr[] = array('service_amount'=>$queryService['amount'], 'extra_id'=>$findJq['id'], 'name'=>$findJq['extra_service_name'], 'service_money_value'=>$findJq['service_money_value']);
				}
				echo json_encode($returnArr);exit;
			} else {
				echo "error";exit;
			}
		}
		exit;
	}
	
	/****************************************************#
	#	Update the charge for extra service               #
	#	According the extra service list 						#
	# Total ammount will also be updated	            #
	# By: T:307 on 08-02-2015   				            	#
	******************************************************/
	
	function updateCharge($id = null){
		if(!empty($this->request)) {
			//$extraSevie_Id = $this->request->data['extraServiceId'];
			//debug($extraSevie_Id);exit;
			//$this->Session->write('extras.serviceId', $extraSevie_Id);
			$tip_value =  $this->request->data['tip_value'];
			$service_charge =  $this->request->data['service_charge'];
			$updatedServiceCharge = substr($service_charge, 1);
			$extra_service_charge =  $this->request->data['extra_service_charge'];
			$serviceChargeArr = explode(',',$extra_service_charge); 
			$extra_charge = '';
			foreach($serviceChargeArr as $chargeArr){
					$extra_charge += 	$chargeArr;
			}
			$total = $updatedServiceCharge + $extra_charge + $tip_value;
			$returnArr = array('extra_charge'=>$extra_charge, 'total_charge'=>$total, 'response'=>'success');
			echo json_encode($returnArr);
		}
		exit;
	}
	
	/****************************************************#
	#	Update the charge for tip service                   #
	# Total ammount will also be updated	            #
	# By: T:307 on 08-02-2015   				            	#
	******************************************************/
	
	function tip($id = null){
		if(!empty($this->request)) {
			 $tip_value = trim($this->request->data['tip_value']);
			 $service_charge = substr($this->request->data['service_charge'], 1);			
			 $extra_fee = ltrim($this->request->data['extra_fee'] , '$');
			 $discount_val = ltrim($this->request->data['discount'] , '$');
			 $afterDiscountAmount =  ($service_charge + $extra_fee) - $discount_val;
			 $totalAmt = $tip_value + $afterDiscountAmount;
			 $total = trim($totalAmt);
			 $returnArr = array('tip_value'=>$tip_value, 'total_amount'=>$total, 'response'=>'success');
			 echo json_encode($returnArr);
		}
		exit;
	}
	
	public function discount() {
		if(!empty($this->request)) {
			$discountTable = TableRegistry::get('Discounts');
			$dis_val = 	$this->request->data['discount_value'];
			$tip_value = ltrim($this->request->data['tip_value'], '$');	
			$service_charge = 	ltrim($this->request->data['service_charge'],'$');
			$extra_fee = 	ltrim($this->request->data['extra_fee'],'$');
			$discountOnAmount = $service_charge +  $extra_fee;
			//$total = $tip_value + $service_charge + $extra_fee;
			$getDiscount = $discountTable->find()->where(['discount_code'=>$dis_val])->first();
			if(!empty($getDiscount)) {
					$todayDate = date('m-d-Y');
					$couponExpDate = $getDiscount->ending_time;
					if($couponExpDate >= $todayDate) {
							$discount_type = 	$getDiscount->discount_type;
							$getAmount = 	$getDiscount->discount_money_value;
							if($discount_type=='amount') {
								  $getFinalAmount = trim($discountOnAmount) - trim($getAmount);
							      $finaldiscount  =  "$".$getAmount;
								  $total = $getFinalAmount + $tip_value;
							} else if($discount_type=='In %') {
								$getPercnt = $getAmount;
								$getFinalAmount = $discountOnAmount-($getAmount/100 * $discountOnAmount);
								$finaldiscount = "$".($getAmount/100) * $discountOnAmount;
								$total = $getFinalAmount + $tip_value;
							}
							$returnArr = array('diccount_value'=>$finaldiscount, 'total_charge'=>$getFinalAmount, 'response'=>'success');
							echo json_encode($returnArr); 
					} else {
						$total = $tip_value + $service_charge + $extra_fee;
							$returnArr = array('diccount_value'=> '0', 'total_charge'=>$total, 'response'=>'Discount coupon has expire');
							echo json_encode($returnArr); exit;	
					}	
			} else {
					$total = $tip_value + $dis_val + $service_charge + $extra_fee;
					$returnArr = array('diccount_value'=> '0', 'total_charge'=>$total,'response'=>'Invalid discount coupon');
					echo json_encode($returnArr);exit;
				}
		}
		exit;
	}
	
	
	
	
	
	
	/****************************************************#
	#	Addbooking function 									  #
	#	Find various data according to the form	 #
	#	By: T:307 on 09-02-2015                           	 #
	****************************************************/
	public function addbooking()  {		
		//use Cake\Datasource\ConnectionManager;
		$userTable 						= TableRegistry::get('Users');		
		$partnerTable 					= TableRegistry::get('Partners');
		$customerTable 				= TableRegistry::get('Customers');		
		$creditCardTable 			= TableRegistry::get('CreditCards');
		$mobileNoCardTable 		= TableRegistry::get('MobileNos');		
		$scheduleServiceTable 	= TableRegistry::get('ScheduledServices');
		/** ------------------------------User Info ---------------------------------- **/
		$user_ID 			= $this->Auth->user('id');
		$getUserData	= $userTable->find()->where(['id'=>$user_ID])->first();
		$getCustomer 	= $customerTable->find()->where(['user_id'=>$user_ID])->first(); 
		$customerID = $getCustomer->id; 
		$this->set('userinfo',$getUserData);
		//debug ($getUserData);die;
		/** =========================================== **/
		
		/** -----------------------------Select Frequency ----------------------- **/
		$frequencyTables = TableRegistry::get('RequestFrequencys');
		$allFrqncyList = $frequencyTables->find('all');
		$this->set('frequencyList',$allFrqncyList);	
		/** ===========================================**/
		
		/**  -----------------------------Get Yards -------------------------------- **/
		$yardsTable = TableRegistry::get('Yards');
		$getyards =    $yardsTable->find('all');
		$this->set('getyards',$getyards);	
		/** ========================================== **/
		
		/** ----------------------------- Select Service ------------------------ **/
		$serviceTables = TableRegistry::get('PartnerProvidedServices');
		$allService = $serviceTables->find('all');
		$this->set('serviceList',$allService);	
		/** ========================================= **/
		
		$stateListTable = TableRegistry::get('StateLists');
		$stateList = $stateListTable->find('all');
		$this->set('stateList',$stateList);		
		
		if ($this->request->is('post'))  {
			//debug($this->request->data());exit;
			if($this->request->data['customer_type'] == 'new_customer')  {	
			
				/**  ------------------ Save Data in ScheduledServices table ------------ **/
				$total_amount 		=  ltrim($this->request->data['payable_money'],'$');					
				$newServiceRow = $scheduleServiceTable->newEntity();
				$newServiceRow->customer_id = $customerID;
				$newServiceRow->pp_services_id = $this->request->data['pp_services_id'];				
				if (!empty($this->request->data['discount_code']))  {
					$newServiceRow->discount_code = $this->request->data['discount_code'];	
				} else {
					$newServiceRow->discount_code = '0';
				}				
				if (!empty($this->request->data['tip_value']))  {
					$newServiceRow->tip = $this->request->data['tip_value'];
				} else {
					$newServiceRow->tip = '0.0';
				}				
				$newServiceRow->payable_money 	= $total_amount;
				$newServiceRow->comment 				= $this->request->data['customer_comment'];
				$newServiceRow->created_at 			= date('Y-m-d H:i', strtotime($this->request->data['created_at']));
				/** ======================================================*/
				
				if($scheduleServiceTable->save($newServiceRow))  {
					$scheduleServiceID = $newServiceRow->id;
					if(!empty($this->request->data['extra_service_list'])) {
						$extra_service_list = explode(',' , $this->request->data['extra_service_list']);
						foreach($extra_service_list as $key=>$new_extra) {
							$extraServiceTable = TableRegistry::get('CustomerExtraServices');
							$newExtraRow = $extraServiceTable->newEntity();
							$newExtraRow->scheduled_service_id = $scheduleServiceID;
							$newExtraRow->customer_id = $customerID;
							$newExtraRow->extra_service_id = $new_extra;
							$extraServiceTable->save($newExtraRow);
						}
					}			
					$connection = ConnectionManager::get('default');
					$connection->insert('customer_property', [
						'customer_id' => $customerID,
						'scheduled_service_id' => $scheduleServiceID,
						'`street-address`' => $this->request->data['street_address'],
						'zip' => $this->request->data['zip_code'],
						'state_id' => $this->request->data['state_id'],
						'city' => $this->request->data['city'],
						'created_at' => date('Y-m-d H:i', strtotime($this->request->data['created_at']))
					]); 
					if ($connection)  {
						$paymentInfo = $creditCardTable->newEntity();
						$paymentInfo->user_id = $user_ID;
						$paymentInfo->credit_card_no = $this->request->data['credit_card_no'];
						$paymentInfo->cvv = $this->request->data['cvc'];
						$paymentInfo->neme_of_the_card = $this->request->data['card_name'];
						$paymentInfo->expire_month_id = $this->request->data['expire_month_id'];
						$paymentInfo->expire_year = $this->request->data['expire_year'];
						$paymentInfo->created_at = date('Y-m-d H:i', strtotime($this->request->data['created_at']));
						if ($creditCardTable->save($paymentInfo)) {	
							$paid_card_id = $paymentInfo->id;
							$newUpdate = $scheduleServiceTable->get($scheduleServiceID); // Return article with id 12
							$newUpdate->paid_card_id = $paid_card_id;
							$scheduleServiceTable->save($newUpdate);
							$connection = ConnectionManager::get('default');
							$connection->insert('`frequency-customer`', [
								'customer_id' => $customerID,
								'frequency_id ' => $this->request->data['frequency_id'],
								'created_at' => date('Y-m-d H:i')
							]);
							$connection = ConnectionManager::get('default');
							$results = $connection
										->newQuery()
										->select('*')
										->from('`frequency-customer`')
										->where(['customer_id ' =>$customerID])
										->execute()
										->fetchAll('assoc');	
							$frqncy_id = $results[0]['id'];	
							$update_freqncy = $scheduleServiceTable->get($scheduleServiceID); 
							$update_freqncy->frequency_customer_id = $frqncy_id;
							$scheduleServiceTable->save($update_freqncy);	
							//echo "true";exit;
							 $this->Flash->success(__('Your Booking has been successfully sumitted'));
							return $this->redirect(['action' => 'index']); 
							//echo "one"; exit;
						}
					}					
				}
			} else if (($this->request->data['customer_type'] == 'existing_customer')) {
				$total_amount 		=  ltrim($this->request->data['payable_money'],'$');
				$newServiceRow	= $scheduleServiceTable->newEntity();
				$newServiceRow->customer_id = $customerID;
				$newServiceRow->pp_services_id = $this->request->data['pp_services_id'];
				$newServiceRow->discount_code = $this->request->data['discount_code'];
				//$newServiceRow->tip = $this->request->data['tip_value'];
				/* if(!empty($this->request->data['discount_code'])) {
				$newServiceRow->discount_code = $this->request->data['discount_code'];	
				} else {
					$newServiceRow->discount_code = time();
				}*/
				if (!empty($this->request->data['tip_value'])) {
						$newServiceRow->tip = $this->request->data['tip_value'];
				} else {
					$newServiceRow->tip = '0.0';
				}  
				$newServiceRow->payable_money = $total_amount;
				$newServiceRow->created_at = date('Y-m-d H:i', strtotime($this->request->data['created_at']));
				//$newServiceRow->created_at =  str_replace("/","-",$this->request->data['created_at']);
				$newServiceRow->status = 0;
				if ($scheduleServiceTable->save($newServiceRow))  {
					$scheduleServiceID = $newServiceRow->id;
					if (!empty($this->request->data['extra_service_list'])) {
						$extra_service_list = explode(',' , $this->request->data['extra_service_list']);
						foreach($extra_service_list as $key=>$new_extra) {
							$extraServiceTable = TableRegistry::get('CustomerExtraServices');
							$newExtraRow = $extraServiceTable->newEntity();
							$newExtraRow->scheduled_service_id = $scheduleServiceID;
							$newExtraRow->customer_id = $customerID;
							$newExtraRow->extra_service_id = $new_extra;
							$extraServiceTable->save($newExtraRow);
						}
					}
					$connection = ConnectionManager::get('default');
					$connection->insert('customer_property', [
						'customer_id' => $customerID,
						'scheduled_service_id' => $scheduleServiceID,
						'`street-address`' => $this->request->data['street_address'],
						'zip' => $this->request->data['zip_code'],
						'state_id' => $this->request->data['state_id'],
						'city' => $this->request->data['city'],
						'created_at' => date('Y-m-d H:s:i')
					]);
					if ($connection) {
						$creditCard = $creditCardTable->find()->where(['user_id'=>$user_ID])->first();
						$getPaymentID = $creditCard->id;
						$newUpdate = $scheduleServiceTable->get($scheduleServiceID); // Return article with id 12
						$newUpdate->paid_card_id = $getPaymentID;
						$scheduleServiceTable->save($newUpdate);
						$connection = ConnectionManager::get('default');
						$connection->insert('`frequency-customer`', [
							'customer_id' => $customerID,
							'frequency_id ' => $this->request->data['frequency_id'],
							'created_at' => date('Y-m-d H:i')
						]);
						$connection = ConnectionManager::get('default');
						$results = $connection
										->newQuery()
										->select('*')
										->from('`frequency-customer`')
										->where(['customer_id ' =>$customerID])
										->execute()
										->fetchAll('assoc');
						$frqncy_id = $results[0]['id'];	
						$update_freqncy = $scheduleServiceTable->get($scheduleServiceID); 
						$update_freqncy->frequency_customer_id = $frqncy_id;
						$scheduleServiceTable->save($update_freqncy);	 
						$this->Flash->success(__('Your Booking has been successfully sumitted'));
						return $this->redirect(['action' => 'index']); 
						//echo "true"; exit;								
					}					
				}
			} 				
		}		
	}
	
	public function search() 
{
		$UsersInfo = TableRegistry::get('Users');
		if(!empty($_REQUEST)){
			$query = array();
			
			if( isset($_REQUEST['term']) && ($_REQUEST['term']!='') ){
				$query = array();
				//$query = $UsersInfo->find()->where(['login_name LIKE'=>'%'.$_REQUEST['term'].'%', 'user_type' => 'customer'])->all();	
				$query = $UsersInfo->find()->where(['login_name LIKE'=>'%'.$_REQUEST['term'].'%', 'user_type' => 'customer'])->all();	
				$countRows = $query->count();
				if($countRows>0){
					foreach($query as $value){
						$data[]  = $value['login_name'];
					}
					echo json_encode($data);
				}
			}
			
			else if( isset($_REQUEST['first_name'])  && ($_REQUEST['first_name']!='') ) {
				$query = $UsersInfo->find('all')->where(['login_name'=>$_REQUEST['first_name']])->contain(['Addresses']);
			//debug($query->toArray());
				$countRows = $query->count();
				if($countRows>0){
					foreach($query as $value){
							$data = array(
								'first_name'=> $value['first_name'],
								'last_name'=> $value['last_name'], 
								'email'=> $value['email'], 
								'mobile_no'=> $value['mobile_no'], 
								'street_address'=>$value['address']['street_address'],
								'city'=>$value['address']['city'],
								'state'=>$value['address']['state_id'],
								'zip'=>$value['address']['zip_code'],
							);
						echo json_encode($data);
					}
				}
			} 
		}
		exit;

		
}
	
		/*************************************************#
	#	Addbooking submission								  #
	#	Find various data according to the form	 #
	#	By: T:307 on 09-02-2015                           	 #
	****************************************************/
	public function submitBooking(){
		$scheduleServiceTable = TableRegistry::get('ScheduledServices');
		if ($this->request->is('post')) {
						$total_amount =  ltrim($this->request->data['payable_money'],'$');
						$newServiceRow = $scheduleServiceTable->newEntity();
						$newServiceRow->customer_id = $this->request->data['customer_id'];
						$newServiceRow->pp_services_id = $this->request->data['pp_services_id'];
						$newServiceRow->discount_code = $this->request->data['discount_code'];
						$newServiceRow->tip = $this->request->data['tip_value'];
						$newServiceRow->payable_money = $total_amount;
						$newServiceRow->created_at = date('Y-m-d H:i', strtotime($this->request->data['created_at']));
						if($scheduleServiceTable->save($newServiceRow)) {
							$scheduleServiceID = $newServiceRow->id;
							$connection = ConnectionManager::get('default');
							$connection->insert('customer_property', [
								'customer_id' => $this->request->data['customer_id'],
								'scheduled_service_id' => $scheduleServiceID,
								'`street-address`' => $this->request->data['street_address'],
								'zip' => $this->request->data['zip_code'],
								'state_id' => $this->request->data['state_id'],
								'city' => $this->request->data['city'],
								'created_at' => date('Y-m-d H:i', strtotime($this->request->data['created_at']))
							]);
							$connection->insert('`frequency-customer`', [
							'customer_id' => $this->request->data['customer_id'],
							'frequency_id ' => $this->request->data['frequency_id'],
							'created_at' => date('Y-m-d H:i')
							]);
							$results = $connection
											->newQuery()
											->select('*')
											->from('`frequency-customer`')
											->where(['customer_id ' =>$this->request->data['customer_id']])
											->execute()
											->fetchAll('assoc');	
							$frqncy_id = $results[0]['id'];
							$update_freqncy = $scheduleServiceTable->get($scheduleServiceID); 
							$update_freqncy->frequency_customer_id = $frqncy_id;
							if($scheduleServiceTable->save($update_freqncy)) {
								echo "Successfully Submited"; exit;
							}
						} exit;
		} exit;
	
	}
	

	
	/*public function view() {
	$loguser = $this->request->session()->read('Auth.User');
	$id = $loguser['id'];  
	$customerInfo = TableRegistry::get('Customers');
	$query = $customerInfo->find()->where(['user_id' => $id])->first();
	$customerID = $query->id;
	$scheduledServiceTable = TableRegistry::get('ScheduledServices'); 
	$query = $scheduledServiceTable->find('all', [
	'conditions' => ['ScheduledServices.customer_id'=>4],
	'contain' => ['CustomerPropertys','']
	]);
	$this->set('jobs',$query);  
	$connection = ConnectionManager::get('default');
	$results = $connection->execute('SELECT 
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
	  ScheduledServices.updated_at AS `ScheduledServices__updated_at`, 
	  ScheduledServices.status AS `ScheduledServices__status`, 
	  CustomerPropertys.id AS `CustomerPropertys__id`, 
	  CustomerPropertys.customer_id AS `CustomerPropertys__customer_id`, 
	  CustomerPropertys.house_no AS `CustomerPropertys__house_no`, 
	  CustomerPropertys.`street-address` AS `CustomerPropertys__street_address`, 
	  CustomerPropertys.zip_code AS `CustomerPropertys__zip_code`, 
	  CustomerPropertys.city AS `CustomerPropertys__city`, 
	  CustomerPropertys.state_id AS `CustomerPropertys__state_id`, 
	  CustomerPropertys.image_url AS `CustomerPropertys__image_url`, 
	  CustomerPropertys.created_at AS `CustomerPropertys__created_at`, 
	  PartnerProvidedServices.id AS `PartnerProvidedServices__id`, 
	  PartnerProvidedServices.service AS `PartnerProvidedServices__service`FROM 
	  scheduled_service ScheduledServices 
	  LEFT JOIN customer_property CustomerPropertys ON CustomerPropertys.id = (ScheduledServices.customer_id) 
	  LEFT JOIN partner_provided_services PartnerProvidedServices ON PartnerProvidedServices.id = (
		ScheduledServices.pp_services_id
	  ) 
	WHERE 
	  ScheduledServices.customer_id = 4')->fetchAll('assoc');
	$this->set('jobs',$results); 
	} */
	


}