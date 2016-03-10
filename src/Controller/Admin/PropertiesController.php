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

class PropertiesController extends AppController
{	

	public function beforeFilter(Event $event)  {
		//$this->Auth->allow(['forgot_pass','reset']);
		parent::beforeFilter($event);

	}	

	public function index()  {
		$userID 			= $this->Auth->user('id');
		$userTable 	= TableRegistry::get('Users');
		$addressTable = TableRegistry::get('Addresses');
		$getPropertyList = $addressTable->find('all')->where(['user_id'=>$userID])->order('Addresses.id desc')->contain(['StateList','Yards']);
		//debug($getPropertyList->toArray());exit;	
		$this->set ('data',$getPropertyList);		
	}
	
	public function addproperty()
    {
		$user_ID = $this->Auth->user('id');
		$customerTables = TableRegistry::get('Customers');
		$getData = $customerTables->find()->where(['user_id'=>$user_ID])->first();
		$getCustomerID = $getData->id;  
		$AddressesTable = TableRegistry::get('Addresses');
		$stateTable 			= TableRegistry::get('StateList');
		$stateTables 		= $stateTable->find('all');
		$yardsTable 			= TableRegistry::get('Yards');
		$yardsTables 		= $yardsTable->find('all');
		$this->set ('stateTables',$stateTables);		
		$this->set ('yardsTables',$yardsTables);		
		//debug($stateTables->toArray());
		//debug($yardsTables->toArray());exit;	
		
		if ($this->request->data)  {			
			//debug ($this->request->data);die;
			$custData 	= $AddressesTable->newEntity();
			$custData->user_id = $user_ID;
			$custData->street_address = $this->request->data['street_address'];
			$custData->city = $this->request->data['city'];
			$custData->zip = $this->request->data['zip'];
			$custData->state_id = $this->request->data['state_id'];
			$custData->size 		= $this->request->data['size'];
			//debug ($custData);die;
			$AddressesTable->save($custData); 	
			$this->Flash->success(__('Your Property has been successfully saved.'));
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
	
	public function editproperty($id=Null)  {		
		$AddressesTable = TableRegistry::get('Addresses');
		$stateTable 			= TableRegistry::get('StateList');
		$stateTables 		= $stateTable->find('all');
		$yardsTable 			= TableRegistry::get('Yards');
		$yardsTables 		= $yardsTable->find('all');
		$this->set ('stateTables',$stateTables);		
		$this->set ('yardsTables',$yardsTables);		
		
		$addressTable = TableRegistry::get('Addresses');
		$getPropertyList = $addressTable->get($id,['contain' => ['StateList','Yards']]);
		//debug($getPropertyList->toArray());exit;	
		$this->set ('data',$getPropertyList);
		
		if ($this->request->data)  {			
			//debug ($this->request->data);die;
			$user 	= TableRegistry::get('Addresses');
			$query = $user->query();
			$query->update()
					->set([
						'street_address' => $this->request->data['street_address'],
						'city' => $this->request->data['city'],
						'zip' => $this->request->data['zip'],
						'state_id' => $this->request->data['state_id'],
						'size' => $this->request->data['size'],
					])
					->where(['id' => $this->request->data['id']])
					->execute();		
			//debug ($custData);die;
			$this->Flash->success(__('Your Property has been successfully updated.'));
			return $this->redirect(['action' => 'index']);
		}
    }
}