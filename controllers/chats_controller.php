<?php
class ChatsController extends AppController {
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('add');
	}
	
	function index() {
		$condition = array(
			'order' => 'Chat.created DESC',
			'limit' => 20
		);
		$this->set('chats', $this->Chat->find('all', $condition));
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->data['Chat']['user_id'] = $this->Auth->user('id');
			if ($this->Chat->save($this->data)) {
				$this->flash('投稿が完了しました。', '/chats/');
			}
		}
	}
}