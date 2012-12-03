<?php class PropertiesController extends AppController {
	public $name = 'Properties';
	public $helpers = array('Html', 'Form');
	var $scaffold;

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}

} ?>
