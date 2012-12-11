<?php class AccountsController extends AppController {
	public $name = 'Accounts';
	public $helpers = array('Html', 'Form');
	var $scaffold;

	public function isAuthorized($user) {
		return parent::isAuthorized($user);
	}

} ?>
