<?php class Simulation extends AppModel {
	public $name = 'Simulations';
	public $validate = array();
    public $belongsTo = array(
        'Owner' => array(
            'className'    => 'User',
            'foreignKey'   => 'owner_id',
			'conditions'   => array(
				'OR' => array(
					'Owner.type' => array('admin','instructor')
				)
			)
        )
    );

	public $hasMany = array(
		'Accounts' => array(
			'className'    => 'Account',
			'foreignKey'   => 'simulation_id'
		)
	);

	public function add() {
		 if ($this->request->is('post')) {
		    $this->request->data['Simulation']['owner_id'] = $this->Auth->user('id'); //Added this line
		    if ($this->Post->save($this->request->data)) {
		        $this->Session->setFlash('Your post has been saved.');
		        $this->redirect(array('action' => 'index'));
		    }
    	}
	}

	public function view() {

	}

	public function isOwnedBy($simulation, $user) {
		return $this->field('id', array('id' => $simulation, 'owner_id' => $user)) === $simulation;
	}

} ?>
