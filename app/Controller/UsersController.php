<?php class UsersController extends AppController {
	public $helpers = array('Time','Html', 'Form');
	public $scaffold;
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('login','logout','register');
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

    public function register($code = 0) {

    }

	public function admin_home() {
		$user = $this->Auth->user();
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
	}

    public function admin_index() {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Invite a New User' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'invite')
        ));
        $this->recursion = 1;
        $this->set('users', $this->User->find('all'));
    }

    public function admin_invite() {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Invite' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'invite')
        ));

    }

    public function admin_view($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id)
        ));
        $this->set('user', $this->User->findById($id));
    }

    public function admin_manage($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id)
        ));
    }

    public function admin_edit($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id)
        ));
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
