<?php

namespace App\Controller\Admin;
//require('twilio/Services/Twilio.php'); 

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
//use twilio\Services\Twilio;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class InvitesController extends AppController
{

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
	 
	public function index() { 
		/* $page_id = 1;
		$getPage = TableRegistry::get('Pages');
		$setPage = $getPage->find()->where(['id' => $page_id])->first();
		$this->set('setPage',$setPage); */
		/** Set the page title here **/
		
		//$this->set('pagesTitle', 'All bookings');
	}
	public function  invite() { 
		if ($this->request->is('post')) {
			$user_email = $this->request->data['email'];
			if (filter_var($user_email, FILTER_VALIDATE_EMAIL) && !empty($user_email)) {
				//echo $user_email.' is valid email';die;
				$rand_number	=	rand(100,10000000000);
				$msg = '<h2>You are inviteted to  join Terra Partner network.</h2><br><h3>Used this code '.$rand_number.' to signup and get benefits.</h3><br><br>';
				$email = new Email('default');
				$res = $email->emailFormat('html')
						->from(['partners@terra-app.com' => 'Terraapp User'])
						->to($user_email)
						->subject('You are inviteted to join Terra Partner network.')
						->send($msg);
				if($res)	{
					$user_referals = TableRegistry::get('UserReferals');	
					$insertData = $user_referals->newEntity();
					$insertData->user_id 		= $this->Auth->User('id');
					$insertData->email 			= $user_email;
					$insertData->phone_no 	= '';
					$insertData->refral_code = $rand_number;
					$insertData->new_comer_user_id = '';
					$insertData->created_at	= date('y-m-d h-i-s');
					$insertData->updated_at= date('y-m-d h-i-s');
					$user_referals->save($insertData);
					$this->Flash->success(__('Your invitation send to user.'));
					return $this->redirect(['action' => 'index']);
				}				
			}   
			
			if (preg_match('/^[0-9]{10}$/', $user_email)) {				
				//echo $user_email.' is valid number';die;
				//App::import('Vendor', 'twilio',array('file' =>'twilio\Services\Twilio.php'));
				$account_sid = 'AC8ae2294d3c80c0dbff24550b4bcf1146'; 
				$auth_token = 'e1b8b0e6b58cf969c39a3cf171eb6297'; 
				$client = new Services_Twilio($account_sid, $auth_token); 
				 
				$client->account->messages->create(array( 
					'To' => "+919988252428", 
					'From' => "+14243428545", 
					'Body' => "Or Rahul Sir,Kya Haal Chal H!", 
					'MediaUrl' => "http://farm2.static.flickr.com/1075/1404618563_3ed9a44a3a.jpg",  
				));
				print $message->sid;		die;				
				$this->Flash->success(__('Your invitation send to user.'));
				return $this->redirect(['action' => 'index']);
			} 
			$this->Flash->success(__('Please enter valid email or phone no.'));
			return $this->redirect(['action' => 'index']);
			exit;
		}
		$this->Flash->success(__('Please enter email or phone no'));
		return $this->redirect(['action' => 'index']);
		exit;
	}

}
	
