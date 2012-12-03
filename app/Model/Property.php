<?php class Property extends AppModel {
	public $name = 'Properties';
	public $validate = array();
	public $belongsTo = array(
		'Account' => array(
            'className'    => 'Account',
            'foreignKey'   => 'account_id'
		)
	);

} ?>
