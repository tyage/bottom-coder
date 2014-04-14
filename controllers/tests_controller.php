<?php
class TestsController extends AppController {
	function admin_add($problem_id = null) {
		if (!empty($this->data)) {
			if ($this->Test->save($this->data)) {
				$this->flash('投稿が完了しました。', '/problems/view/'.$this->data['Test']['problem_id']);
			}
		}
		
		if(!is_null($problem_id)) {
			$this->data['Test']['problem_id'] = $problem_id;
		}
	}
}