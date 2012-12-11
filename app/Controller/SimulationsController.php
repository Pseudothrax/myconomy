<?php class SimulationsController extends AppController {
	public $helpers = array('Time','Html', 'Form');

	public function admin_add() {
        $this->set('title', 'Create a New Simulation');
        $this->set('instructors',$this->Simulation->Owner->find('list',array('fields'=>array('id','username'),'conditions'=>array('type'=>'instructor'))));
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
		 if ($this->request->is('post')) {
		    if ($this->Simulation->save($this->request->data)) {
		        $this->Session->setFlash('Simulation Created.');
				$this->redirect(array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action' => 'index'));
		    }
		}
	}

	public function admin_index() {
        $this->set('title', 'Simulations');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
		$this->recursion = 1;
		$this->set('simulations', $this->Simulation->find('all'));
	}

	public function admin_view($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('', $this->Simulation->adminsubsubmenu($id)));
		$this->set('simulation', $this->Simulation->findById($id));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
	}

	public function admin_manage($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Manage');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Manage',$this->Simulation->adminsubsubmenu($id)));
        $this->recursion = 0;
        $this->set('simulation', $simulation);
	}

    public function admin_properties($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Properties');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Properties',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array( 'List', $this->Simulation->adminpropertyactions($id)));

        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }

    public function admin_propertyMap($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Properties');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Properties',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array( 'Map', $this->Simulation->adminpropertyactions($id)));

        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }

    public function admin_createProperty($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Properties');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Properties',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array( 'Create Property', $this->Simulation->adminpropertyactions($id)));

        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }

    public function admin_accounts($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Accounts');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Accounts',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array( 'List',$this->Simulation->adminaccountactions($id)));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }

    public function admin_createAccount($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Accounts');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Accounts',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array('Create Account',$this->Simulation->adminaccountactions($id)));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }

    public function admin_trades($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Trades');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Trades',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array('List',$this->Simulation->admintradeactions($id)));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }


    public function admin_openTrades($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Trades');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Trades',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array('Open',$this->Simulation->admintradeactions($id)));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
    }


    public function admin_forceTrade($id = null) {
        $simulation = $this->Simulation->findById($id);
        $this->set('title', 'Simulation '.$simulation['Simulation']['name']);
        $this->set('subtitle', 'Trades');
        $this->set('menu', array('Simulations',$this->Simulation->adminmenu()));
        $this->set('submenu', array('',$this->Simulation->adminsubmenu()));
        $this->set('subsubmenu', array('Trades',$this->Simulation->adminsubsubmenu($id)));
        $this->set('actions', array('Force Trade',$this->Simulation->admintradeactions($id)));
        $this->recursion = 1;
        $this->set('simulation', $simulation);
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

    public function instructor_index() {
		//instructor receives list of their simulations

	}

	public function index() {
		//students see only the simulations they are part of

	}

	public function isAuthorized($user) {

		return parent::isAuthorized($user);
	}

} ?>
