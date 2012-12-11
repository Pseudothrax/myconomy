<?php class User extends AppModel {
	public $virtualFields = array(
		'name' => "CONCAT(User.first_name,' ',User.last_name)"
	);
	public $hasMany = array(
        'Simulations' => array(
            'className'    => 'Simulation',
            'foreignKey'   => 'owner_id'
        ),
		'Accounts' => array(
			'className'    => 'Account',
			'foreignKey'   => 'user_id'
		)
	);
    public $validate = array(
		'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'type' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'instructor','student')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
		'email' => 'email'
	);

	//add

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
		    $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
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
            'Create New User' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'create')
        );
    }

    public function adminsubsubmenu($id, $type) {
        if($type === 'instructor') return array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id),
            'Simulations' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'simulations',$id)
        );
        if($type === 'student') return array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id),
            'Accounts' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'accounts',$id)
        );
        if($type === 'admin') return array(
            'Manage' => array('admin'=>true,'instructor'=>false,'controller'=>'users','action'=>'manage',$id)
        );
    }

} ?>
