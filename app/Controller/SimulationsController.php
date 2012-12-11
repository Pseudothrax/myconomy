<?php class SimulationsController extends AppController {
	public $helpers = array('Time','Html', 'Form');

	public function admin_add() {
		 $this->set('instructors',$this->Simulation->Owner->find('list',array('fields'=>array('id','username'),'conditions'=>array('type'=>'instructor'))));
		 if ($this->request->is('post')) {	
		    if ($this->Simulation->save($this->request->data)) {
		        $this->Session->setFlash('Simulation Created.');
				$this->redirect(array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action' => 'index'));
		    }
		}
	}

	public function instructor_add() {
		 if ($this->request->is('post')) {
		    $this->request->data['Simulation']['owner_id'] = $this->Auth->user('id');
		    if ($this->Simulation->save($this->request->data)) {
		        $this->Session->setFlash('Simulation Created.');
				$this->redirect(array('admin'=>false,'instructor'=>true,'controller'=>'simulations','action' => 'index'));
		    }
		}
	}

	public function admin_index() {
		$this->set('menu', array(
			'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
			'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
			'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
		));
		$this->set('submenu', array(
			'Create New Simulation' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'add')
		));
		$this->recursion = 1;
		$this->set('simulations', $this->Simulation->find('all'));
	}

	public function admin_view($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
		$this->set('submenu', array(
			'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
		));
		$this->set('simulation', $this->Simulation->findById($id));
	}

	public function admin_manage($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
		$this->set('submenu', array(
			'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
		));
        $this->set('subsubmenu', array(
            'Edit' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'edit',$id)
        ));

	}

    public function admin_properties($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
        ));
    }

    public function admin_accounts($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
        ));
        $this->set('subsubmenu', array(
            'Invite' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'invite',$id)
        ));
    }

    public function admin_invite($id = null) {
        $this->set('menu', array(
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index')
        ));
        $this->set('submenu', array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
        ));
        $this->set('subsubmenu', array(
            'Invite' => array('admin'=>true,'instructor'=>false,'controller'=>'controller','action'=>'invite',$id)
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
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id)
        ));
        $this->set('subsubmenu', array(
            'Edit' => array('admin'=>true,'instructor'=>false,'controller'=>'controller','action'=>'invite',$id)
        ));
    }

	public function instructor_index() {
		//instructor receives list of their simulations

	}

	public function index() {
		//students see only the simulations they are part of

	}

	public function isAuthorized($user) {

		if(in_array($this->action, array('add'))) {
			if(isset($user['type']) and $user['type'] === 'instructor') {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

} ?>
