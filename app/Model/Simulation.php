
<?php class Simulation extends AppModel {

	public $validate = array();
    public $belongsTo = array(
        'Owner' => array(
            'className'    => 'Users',
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
		),
        'Trades' => array(

        ),
        'Offers' => array(
            'className'   => 'Offer',
            'foreignKey'  => 'simulation_id'
        ),
        'Properties' => array(
            'className'   => 'Property',
            'foreignKey'  => 'simulation_id'
        )
	);

	public function isOwnedBy($simulation, $user) {
		return $this->field('id', array('id' => $simulation, 'owner_id' => $user)) === $simulation;
	}

    public function adminmenu() {
        return array(
            'Home' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'home'),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'index'),
            'Users' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'index'),
            'Logout' => array('admin'=>false,'instructor'=>false,'controller'=>'users','action'=>'logout')
        );
    }

    public function adminsubmenu() {
        return array(
            'Create New Simulation' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'add')
        );
    }

    public function adminsubsubmenu($id) {
        return array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'manage',$id),
            'Properties' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id),
            'Trades' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'trades',$id)
        );
    }

    public function adminpropertyactions($id) {
        return array(
            'List' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'properties',$id),
            'Map' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'propertyMap',$id),
            'Create Property' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'createProperty',$id)
        );
    }

    public function adminaccountactions($id) {
        return array(
            'List' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'accounts',$id),
            'Create Account' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'createAccount',$id)
        );
    }

    public function admintradeactions($id) {
        return array(
            'List' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'trades',$id),
            'Open' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'openTrades',$id),
            'Force Trade' => array('admin'=>true,'instructor'=>false,'controller'=>'simulations','action'=>'forceTrade',$id)
        );
    }
} ?>
