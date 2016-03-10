<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{	

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}

	public function add() 
	{
		/*** Page layout is neccessary for each page ***/
		$title = 'Register';
		$this->set('admintitle_for_page',$title);
		$this->viewBuilder()->layout('register');
		$randomString = md5(time());
		$this->request->data['referal_code'] = $randomString;
		$this->request->data['user_type'] = 'customer';
		$this->request->data['created_at'] = date('Y-m-d,H:i:s');
		
		/*******************************************************/
		$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user,$this->request->data);
            if($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            } 
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
	}
}
?>