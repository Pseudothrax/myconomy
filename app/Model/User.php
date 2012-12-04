<?php class User extends AppModel {
	public $virtualFields = array(
		'name' => "CONCAT(User.first_name,' ',User.last_name)"
	);
	public $hasMany = array(
        'Simulation' => array(
            'className'    => 'Simulation',
            'foreignKey'   => 'owner_id'
        ),
		'Account' => array(
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


} ?>
