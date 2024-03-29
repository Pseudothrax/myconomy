<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public function beforeFilter() {
		
	}
    public $components = array(
        'Session',
        'Auth' => array(
			'loginRedirect' => array('admin'=>false,'instructor'=>false,'controller' => 'users', 'action' => 'home'),
            'logoutRedirect' => array('admin'=>false,'instructor'=>false,'controller' => 'users', 'action' => 'login'),
			'authorize' => array('Controller')
        )
    );

	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['type'])) {
			if($user['type'] === 'admin' and isset($this->params['prefix']) and $this->params['prefix'] === 'admin') {
				return true;
			}
			if($user['type'] === 'instructor' and isset($this->params['prefix']) and $this->params['prefix'] === 'instructor') {
				return true;
			}
			if($user['type'] === 'student' and !isset($this->params['prefix'])) {
				return true;
			}
		}

		// Default deny
		return false;
	}
}
