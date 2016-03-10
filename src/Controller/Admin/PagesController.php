<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class PagesController extends AppController
{	

	
	##################### Controller Settings for component and Variables ####################
	public $paginate = [ 'limit' => 10,'order' => ['Pages.id' => 'asc'] ];
	
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
	################################ End Controller settings  ########################################
	
	
	
	public function index() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Pages';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$GetPages = TableRegistry::get('Pages');
		$AllPage = $GetPages->find();
		
		$this->set('allPage',$this->paginate($AllPage));
		
	}
	
	public function add() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Add Page';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$page = $this->Pages->newEntity();
		if ($this->request->is('post')) {
			$page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) { 
				$this->Flash->success(__('The page has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
		}
		$this->set('page', $page);
		
	}
	

	
	public function edit($id = null)
	{
	
		/*** Page layout is neccessary for each page ***/
		$title = 'Add Page';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		$GetPages = TableRegistry::get('Pages');
		$setPage = $GetPages->find()->where(['id' => $id]);
		$this->set('pagesRow',$setPage);
	
		$getPage = $this->Pages->get($id);
		if ($this->request->is(['post','put'])) {
			$page = $this->Pages->patchEntity($getPage, $this->request->data);
			$page->updated = date("Y-m-d H:i:s");
			if ($this->Pages->save($page)) {
				$this->Flash->success(__('Page has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		$this->set('page', $getPage);
	}
	
	public function delete($id)
	{
		$page = $this->Pages->get($id);
		if ($this->Pages->delete($page)) {
			$this->Flash->success(__('The page has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
		

}
