<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Exception\InternalErrorException;
use Cake\I18n\Time;
use Cake\Network\Email\Email;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\View\Helper\HtmlHelper;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{	

	public function beforeFilter(Event $event)
	{
		//$this->Auth->allow(['forgot_pass','reset']);
		//parent::beforeFilter($event);
	}
	

	public function login() {
		/*** Page layout is neccessary for each page ***/
		//$title = 'Login';
		//$this->set('admintitle_for_page',$title);
		$this->viewBuilder()->layout("");
		/*******************************************************/
		if ($this->request->is('post')) { 
			$user = $this->Auth->identify();
			//debug($user);die;
			if ($user) {
				if($user['user_type'] == 'customer') {
					$this->Auth->setUser($user);
					return $this->redirect($this->Auth->redirectUrl());
				}
				else {
					$this->Flash->error(__('Please enter only partner detail'),'default',[],'auth');
				}
			} 
			else {
				$this->Flash->error(__('Username or password is incorrect'),'default',[],'auth');
			}
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function index() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Profile';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$loguser = $this->request->session()->read('Auth.User');
		$user_id = $loguser['id'];
		$GetUsers = TableRegistry::get('Users');
		$logedinUser = $GetUsers->find()->where(['id' => $user_id]);
		$this->set('logedinUser',$logedinUser);
		
		$user = $this->Users->get($user_id);
		if ($this->request->is(['post', 'put'])) {
			$userData = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($userData)) {
				$this->Flash->success(__('Profile has been updated'));
			}
		}
		$this->set('user', $user);
	}
	
	public function forgot_pass () {
	$this->viewBuilder()->layout('adminLogin');
	$userTable = TableRegistry::get('Users');
	if($this->request->is(['put','post'])) {
		if(!empty($this->request->data['email'])) {
		$userData	 = $userTable->findByEmail($this->request->data['email']);
		if(!empty($userData)) {
			$test = json_encode($userData);
			$test1 = json_decode($test);
			$key  = Security::hash(Text::uuid(),'sha512',true);
			$hash = sha1($test1[0]->login_name .rand(0,100));
			$url =  Router::url(['controller' => 'Users', 'action' => 'reset'],true).'/'.$key.'#'.$hash;
			$msg = "<p>Hello ,<br/>".$test1[0]->login_name ."<br/> <a href = '".$url."' >Click Here</a> to reset your password.</p><br /> ";
				$query = $userTable->query();
				$query->update()
					->set(['token' => $key])
					->where(['email' => $this->request->data['email']])
					->execute();
			$email = new Email('default');
			$res = $email->emailFormat('html')
				->from(['partners@terra-app.com' => 'Terraapp User'])
				->to($this->request->data['email'])
				->subject('forgot password')
				->send($msg);
			$this->Flash->success(__('Check Your Email To Reset your password'));
			return $this->redirect(['action' => 'login']);	
			}
			else{
				$this->Session->setFlash("Error Generating Reset link");
			}
		} else {
			$this->Flash->success(__('Please Provide Your Email Address that You used to Register with Us'));
			return $this->redirect(['action' => 'index']);
		}
		
		} 

	}
	
	public function reset($token=null) {
			$this->viewBuilder()->layout('adminLogin');
			$userTable = TableRegistry::get('Users');
			$this->set('mytoken',$token);
			if(empty($token)) {
					$this->Flash->success(__('Token Corrupted '));
					return $this->redirect(['action' => 'reset']);
			}
			if($this->request->is(['put','post']))  {
				//	debug($this->request->data);exit;
					if($this->request->data['new_pass'] != $this->request->data['confirm_pass']) {
						$this->Flash->success(__('Both the passwords are not matching'));
						return $this->redirect(['action' => 'reset']);
					} 
					else {
					$new =	(new DefaultPasswordHasher)->hash($this->request->data['confirm_pass']);
						$query = $userTable->query();
						$query->update()
							->set(['password' => $new])
							->where(['token' => $token])
							->execute();
						$this->Flash->success(__('Your password has been updated successfully'));
						return $this->redirect(['action' => 'login']);	
					}
			} 
	}	  

}