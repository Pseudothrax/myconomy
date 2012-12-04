<?php class Account extends AppModel {
	public $name = 'Accounts';
	public $validate = array();
	public $belongsTo = array(
		'Simulation' => array(
			'className'    => 'Simulation',
            'foreignKey'   => 'simulation_id'
		),
		'User' => array(
			'className'    => 'User',
            'foreignKey'   => 'user_id'
		)
	);
	public $hasMany = array(
		'Properties' => array(
			'className'    => 'Property',
			'foreignKey'   => 'account_id'
		)
	);

} ?>
