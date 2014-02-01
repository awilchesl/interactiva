<?php App::uses('AppModel', 'Model');
class Page extends AppModel {
    public $name = 'Page';
	public $belongsTo = 'User';
}