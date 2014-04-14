<?php
class User extends AppModel {
	var $validate = array(
		'username' => array(
			'rule' => 'isUnique',
			'message' => 'その名前は既に使われています。'
		)
	);
}