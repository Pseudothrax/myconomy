<?php class UsersController extends AppController {
	public $helpers = array('Time','Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('login','logout','register');
	}

	public function login() {
        $this->set('title','Interactive Economics for the Classroom');
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
        $this->set('title', 'Home');
        $this->set('menu', array('',$this->User->adminmenu()));
	}

    public function admin_index() {
        $this->set('title', 'Users');
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('',$this->User->adminsubmenu()));
        $this->recursion = 1;
        $this->set('users', $this->User->find('all'));
    }

    public function admin_create() {
        $this->set('title', 'Create New User');
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('Create New User',$this->User->adminsubmenu()));
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User Created.');
                $this->redirect(array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index'));
            }
        }
    }

    public function admin_view($id = null) {
        $this->recursion = 2;
        $user = $this->User->findById($id);
        $this->set('title', 'User '.$user['User']['first_name'].' '.$user['User']['last_name']);
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('',$this->User->adminsubmenu()));
        $this->set('subsubmenu',array('List',$this->User->adminsubsubmenu($id,$user['User']['type'])));
        $this->set('user', $user);
    }

    public function admin_accounts($id = null) {
        $user = $this->User->findById($id);
        $this->set('title', 'User '.$user['User']['first_name'].' '.$user['User']['last_name']);
        $this->set('subtitle', 'Accounts');
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('',$this->User->adminsubmenu()));
        $this->set('subsubmenu',array('Accounts',$this->User->adminsubsubmenu($id,$user['User']['type'])));
        $this->set('user', $user);
    }

    public function admin_simulations($id = null) {
        $user = $this->User->findById($id);
        $this->set('title', 'User '.$user['User']['first_name'].' '.$user['User']['last_name']);
        $this->set('subtitle', 'Simulations');
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('',$this->User->adminsubmenu()));
        $this->set('subsubmenu',array('Simulations',$this->User->adminsubsubmenu($id,$user['User']['type'])));
        $this->set('user', $user);
    }

    public function admin_manage($id = null) {
        $user = $this->User->findById($id);
        $this->set('title', 'User '.$user['User']['first_name'].' '.$user['User']['last_name']);
        $this->set('subtitle', 'Manage');
        $this->set('menu', array('Users',$this->User->adminmenu()));
        $this->set('submenu', array('',$this->User->adminsubmenu()));
        $this->set('subsubmenu',array('Manage',$this->User->adminsubsubmenu($id,$user['User']['type'])));
    }

} ?>
