<?php class UsersController extends AppController {
	public $name = 'Users';
	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('login','logout'); // Letting users register themselves
	}

	public function login() {
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
				$type = $this->Auth->User('type');
				if($type === 'admin') {
					$this->Auth->loginRedirect = array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home');
				}
				else if($type === 'instructor') {
					$this->Auth->loginRedirect = array('admin'=>false,'instructor'=>true,'controller'=>'users','action'=>'home');
				}
		        $this->redirect($this->Auth->redirect());
		    } else {
		        $this->Session->setFlash(__('Invalid username or password, try again'));
		    }
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function admin_home() {
		$user = $this->Auth->user();
		$this->set('menu', array(
			'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
			'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index')
		));
	}

	public function admin_index() {

	}

	public function instructor_home() {
		$user = $this->Auth->user();
		$this->set('menu', array(
			'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout')
		));
	}

	public function home() {
		$user = $this->Auth->user();
		$this->set('menu', array(
			'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout')
		));
	}

} ?>
