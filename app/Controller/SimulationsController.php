<?php class SimulationsController extends AppController {
	public $name = 'Simulations';
	public $helpers = array('Time','Html', 'Form');
	

	public function admin_add() {
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
		//admin receives list of all simulations
		$this->set('menu', array(
			'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout'),
			'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index')
		));
		$this->set('submenu', array(
			'Create New Simulation' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'add')
		));
		$this->recursion = 1;
		$this->set('simulations', $this->Simulation->find('all'));

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
