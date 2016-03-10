<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Exception\InternalErrorException;
use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ProfilesController extends AppController
{
	/* public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    } */
public function index() 
{
		$loguser = $this->request->session()->read('Auth.User');
		$id = $loguser['id'];
		$userTable = TableRegistry::get('Users');
		$userInfo = $userTable->get($id);
		if($this->request->is(['post','put']))
		{
			$user = $userTable->patchEntity($userInfo, $this->request->data);
			$user->updated_at = date("Y-m-d H:i:s");
			if ($userTable->save($user)) {
				$this->Flash->success(__('User has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		
		$this->set('userInfo',$userInfo);	
}
	
/* 	public function index() {
		$loguser = $this->request->session()->read('Auth.User');
		$id = $loguser['id'];
		$user = TableRegistry::get('Users');
		$userInfo = $user->get($id,['contain' => ['Customers','Addresses']]);
			if($this->request->is(['post','put'])) 
			{
				if(!empty($this->request->data['first_name'])) {
				$first_name = $this->request->data['first_name'];
				} else {
					$first_name = $userInfo->first_name;
				}
				if(!empty($this->request->data['last_name'])) {
				$last_name = $this->request->data['last_name'];
				} else {
					$last_name = $userInfo->first_name;
				}
				$userInfo->first_name = $first_name;
				$userInfo->last_name = $last_name;
				$user->save($userInfo); 
				
				if(!empty($this->request->data['street_address'])) {
				$street_address = $this->request->data['street_address'];
				} else {
					$street_address = $userInfo->address->street_address;
				}
				if(!empty($this->request->data['city'])) {
				$city = $this->request->data['city'];
				} else {
					$city = $userInfo->address->city;
				}
					$addressTable = TableRegistry::get('Addresses');
					$query = $addressTable->findByUser_id($id);	
					$test = json_encode($query);
					$hitest = json_decode($test);
					$addressID = $hitest[0]->id;
					$data = $addressTable->get($addressID);
						$data->street_address = $street_address;
						$data->city = $city;
						$addressTable->save($data); 
						
				if(!empty($this->request->data['email'])) {
				$email = $this->request->data['email'];
				} else {
					$email = $userInfo->customer->email;
				}		
				$customerTable = TableRegistry::get('Customers');
				$cusQuery = $customerTable->findByUser_id($id);	
					$encod = json_encode($cusQuery);
					$getData = json_decode($encod);
					$customerID = $getData[0]->id;
					$getCustomerData = $customerTable->get($customerID);
					$getCustomerData->email =  $email;
					$customerTable->save($getCustomerData);
					
				$this->Flash->success(__('Successfully update'));
				return $this->redirect(['action' => 'index']);	
			}
			
		$this->set('userInfo',$userInfo);	
		//debug($userInfo->toArray());exit;
} */

// #### change image ########
	public function changeImage() {
		$id = $this->request->data['id'];
		$GetPartner = TableRegistry::get('users');
		$data = $GetPartner->get($id);
		if ($this->request->is(['post', 'put'])) {
		//debug($this->request->data());exit;
				$one = $this->request->data['profile_image'];		
				if(!empty($this->request->data['profile_image']['name'])) {
					if(!empty($data->profile_image)){
						$old = WWW_ROOT.'img'.DS.'profileImage'.DS .$data ->profile_image;
						unlink($old);
					}
				} 
			$one = $this->request->data['profile_image'];
            if($this->request->data['profile_image']['name']!=""){
            $this->request->data['profile_image'] = $one['name'];  
            } else{
               $this->request->data['profile_image'] = $data->profile_image;
            }
			$GetPartner->patchEntity($data, $this->request->data);
			if ($GetPartner->save($data)) {
			if ($one['error'] == 0) {
			$pth = WWW_ROOT.'img'.DS.'profileImage'.DS .$one['name'];
             move_uploaded_file($one['tmp_name'], $pth);                   
             }
				$this->Flash->success(__('Your Users has been updated.'));
				return $this->redirect(['action' => 'index']);
			}	
		}		
	}

// #### change password ########
public function changepass() {
	$loguser = $this->request->session()->read('Auth.User');
	$id = $loguser['id']; 
	$user = TableRegistry::get('Users');
	$userInfo = $user->get($id);
	if ($this->request->is(['post', 'put'])) {
		$d = $this->request->data['opass'];	
		if ((new DefaultPasswordHasher)->check($d, $userInfo->password)) {
			if($this->request->data['new_pass'] != $this->request->data['confirm_pass'] ){
						$this->Session->setFlash("New password and Confirm password field do not match");
						return $this->redirect(['action' => 'changepass']);
			} else {
			$new =	(new DefaultPasswordHasher)->hash($this->request->data['confirm_pass']);
			$query = $user->query();
			$query->update()
					->set(['password' => $new])
					->where(['id' => $id])
					->execute();
				$this->Flash->success(__('Password updated successfully'));
				return $this->redirect(['action' => 'changepass']);
			}             
		}  else {
		$this->Flash->success(__('Your old password did not match'));
		return $this->redirect(['action' => 'changepass']);
		} 
		$this->set('userInfo',$userInfo);	
	}
}

/* public function forgotpass() {

} */


}