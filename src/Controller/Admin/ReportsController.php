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
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ReportsController extends AppController
{

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
	 
public function index() 
{ 
	$loguser = $this->request->session()->read('Auth.User');
	$id = $loguser['id'];  
	$customerInfo = TableRegistry::get('Customers');
	$query = $customerInfo->find()->where(['user_id' => $id])->first();
	$customerID = $query->id;
	$scheduledServiceTable = TableRegistry::get('ScheduledServices');
	$ser = $scheduledServiceTable->find('all', [
	'conditions' => ['customer_id' => $customerID],
	'contain' => ['PartnerServiceSchedulings','PartnerProvidedServices']
	]);
	//debug($ser->toArray());exit;
	$this->set('jobs',$ser); 	
}

/* 	public function view($date=null) {
	$Date = $date;
	$loguser = $this->request->session()->read('Auth.User');
	$id = $loguser['id'];  
	$PartnersInfo = TableRegistry::get('Partners');
	$query = $PartnersInfo->find()->where(['user_id' => $id])->first();
	$p_id = $query['id'];
	$ServiceSchedule = TableRegistry::get('PartnerServiceSchedulings');	
	$ser = $ServiceSchedule->find('all', [
    'conditions' => ['partner_id' => $p_id],
    'contain' => ['ScheduledServices']
	]);
	$this->set('jobs',$ser); 
	$this->set('date',$Date); 
	}
 */
}