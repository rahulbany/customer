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

class PaymentsController extends AppController
{	

	public function beforeFilter(Event $event)  {
		//$this->Auth->allow(['forgot_pass','reset']);
		parent::beforeFilter($event);

	}	

	public function index()  {
		$userID 			= $this->request->session()->read('Auth.User');
		$userTable 	= TableRegistry::get('Users');
		$creditCardsTable = TableRegistry::get('CreditCards');
		$getCreditInfo = $creditCardsTable->find('all')->where(['user_id'=>$userID])->contain(['Users']);
		//debug($getCreditInfo->toArray());exit;
		$this->set ('data',$getCreditInfo);		
	}
	
	public function addcreditcard()
    {
		$user_ID = $this->Auth->user('id');
		$customerTables = TableRegistry::get('Customers');
		$getData = $customerTables->find()->where(['user_id'=>$user_ID])->first();
		$getCustomerID = $getData->id;  
		$creditCardsTable = TableRegistry::get('CreditCards');
		if ($this->request->data)  {			
			//debug ($this->request->data);die;
			$userID 		= $this->request->session()->read('Auth.User');			
			$newRow 	= $creditCardsTable->newEntity();
			$newRow->user_id = $userID;
			$newRow->customer_id = $getCustomerID;
			$newRow->credit_card_no = $this->request->data['credit_card_no'];
			$newRow->cvv = $this->request->data['cvv'];
			$newRow->expire_month_id =$this->request->data['expire_month_id'];
			$newRow->expire_year = $this->request->data['expire_year'];
			$newRow->neme_of_the_card = $this->request->data['name_of_the_card'];
			$newRow->is_enabled = 0;
			$newRow->created_at =  date('Y-m-d H:i');
			$creditCardsTable->save($newRow);			
			$this->Flash->success(__('Your CreditCard has been successfully saved.'));
			return $this->redirect(['action' => 'index']);
		}
    }
	
	public function card_status ($user_id=Null,$creditCards_id=Null) {
		$creditCardsTable = TableRegistry::get('CreditCards');
		$query = $creditCardsTable->query();
		$query->update()
			->set(['is_enabled' => 0])
			->where(['user_id' => $user_id])
			->execute();
		$query->update()
			->set(['is_enabled' => 1])
			->where(['user_id' => $user_id,'id' => $creditCards_id])
			->execute();
		$this->Flash->success(__('Your CreditCard has been successfully saved.'));
		return $this->redirect(['action' => 'index']);
	}
}