<?php
class Answer extends AppModel {
	var $belongsTo = array('User', 'Problem');
}