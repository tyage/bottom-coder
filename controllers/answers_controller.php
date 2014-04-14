<?php
class AnswersController extends AppController {
	var $uses = array('Answer', 'Test');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('add', 'index', 'test');
	}
	
	function admin_index() {
		$this->paginate = array(
			'order' => 'Answer.created DESC',
		);
		$this->set('answers', $this->paginate());
	}
	
	function index() {
		$this->paginate = array(
			'conditions' => array(
				'Answer.user_id' => $this->Auth->user('id')
			),
			'order' => 'Answer.created DESC',
		);
		$this->set('answers', $this->paginate());
	}
	
	function view($id) {
		$answer = $this->Answer->findById($id);
		if ($this->Auth->user('id') == $answer['User']['id'] or $this->Auth->user('role') == 'admin') {
			$this->set('answer', $answer);
		}
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->data['Answer']['user_id'] = $this->Auth->user('id');
			if ($this->Answer->save($this->data)) {
				$id = $this->Answer->getLastInsertId();
				$this->flash('投稿が完了しました。', '/answers/view/'.$id);
			}
		}
	}
	
	function language() {
		return array(
			'awk' => 'awk',
			'bas' => 'BASIC',
			'c' => 'C',
			'el' => 'Emacs Lisp',
			'hs' => 'Haskell',
			'io' => 'Io',
			'js' => 'JavaScript',
			'lsp' => 'Common Lisp',
			'lua' => 'Lua',
			'm4' => 'm4',
			'ml' => 'OCaml',
			'p6' => 'Perl 6 (rakudo)',
			'php' => 'PHP',
			'pl' => 'Perl',
			'ps' => 'PostScript',
			'py' => 'Python',
			'py3' => 'Python3.1',
			'rb' => 'Ruby',
			'rb19' => 'Ruby1.9',
			'scm' => 'Scheme',
			'tcl' => 'Tcl'
		);
	}
	
	function test($id) {
		$answer = $this->Answer->findById($id);
		$this->set('answer', $answer);
		
		if ($this->Auth->user('id') === $answer['Answer']['user_id'] or $this->isAdmin) {
			$tests = $this->Test->findAllByProblemId($answer['Answer']['problem_id']);
			foreach ($tests as $i => $test) {
				$test['Test']['correct'] = $this->_test($answer, $test);
				$tests[$i] = $test;
			}
			$this->set('tests', $tests);
		}
	}
	
	function _test($answer, $test) {
		$search = array();
		$replace = array();
		for ($i = 1; $i <= 5; $i++) {
			$input = $test['Test']['input'.$i];
			if (!empty($input)) {
				list($key, $value) = explode(':', $input, 2);
				$search[] = $key;
				$replace[] = $value;
			}
		}
		
		$code = $answer['Answer']['code'];
		$code = str_replace($search, $replace, $code);
		$code = urlencode($code);
		
		$result = file_get_contents('http://api.dan.co.jp/lleval.cgi?s='.$code.'&l='.$answer['Answer']['language']);
		$result = json_decode($result);
		return rtrim($result->stdout) == $test['Test']['answer'];
	}
}