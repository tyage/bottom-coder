<?php
class SystemsController extends AppController {	
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->System->save($this->data)) {
				$this->flash('お知らせを追加しました。', '/');
			}
		}
	}
	
	function index() {
		$this->paginate = array(
			'order' => 'System.created DESC'
		);
		return $this->paginate();
	}
}