<?php
class ProblemsController extends AppController {
	var $uses = array('Problem', 'Test');
	
	function view($id) {
		$this->set('problem', $this->Problem->findById($id));
	}
	
	function active() {
		$condition = array(
			'conditions' => array(
				'Problem.end' => 0
			)
		);
		return $this->Problem->find('all', $condition);
	}
	
	function index() {
		$this->paginate = array(
			'order' => 'Problem.created DESC'
		);
		$this->set('problems', $this->paginate());
	}
	
	function admin_index() {
		$this->paginate = array(
			'order' => 'Problem.created DESC'
		);
		$this->set('problems', $this->paginate());
	}
	
	function admin_end($id) {
		$this->Problem->id = $id;
		$this->Problem->save(
			array(
				'Problem' => array(
					'end' => 1
				)
			)
		);
		$this->flash('終了しました。', '/');
	}
	
	function tests($id) {
		$condition = array(
			'conditions' => array(
				'Test.problem_id' => $id,
				'Test.public' => 1
			)
		);
		return $this->Test->find('all', $condition);
	}
	
	function admin_add() {
		if (!empty($this->data)) {
			if ($this->Problem->save($this->data)) {
				$id = $this->Problem->getLastInsertId();
				$this->flash('投稿が完了しました。', '/problems/view/'.$id);
			}
		}
	}
}