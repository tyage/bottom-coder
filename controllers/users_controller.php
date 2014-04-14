<?php
class UsersController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('logout');
	}

	function login() {
	}

	function logout() {
		$this->redirect($this->Auth->logout());
	}

	function add() {
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Auth->login($this->data);
				
				$this->flash('登録が完了しました。', $this->Auth->redirect());
			}
			$this->data['User']['password'] = '';
		}
	}
}