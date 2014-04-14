<?php
class AppController extends Controller{
	var $components = array('Auth', 'RequestHandler');

	var $isAdmin = false;
	
	function beforeFilter() {
		$this->Auth->allow('*');
		
		$this->isAdmin = $this->Auth->user('role') === 'admin';
		if (!empty($this->params['admin']) and !$this->isAdmin) {
			$this->redirect('/users/login');
		}
		
		if ($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
		
		$this->set('User', $this->Auth->user());
	}
}