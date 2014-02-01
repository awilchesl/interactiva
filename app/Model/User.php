<?php App::uses('AppModel', 'Model');
class User extends AppModel {
    public $name = 'User';
	
	public $validate = array(
    'email' => 'email'
    ,
    'username' => array(
        'required' => array(
            'rule' => array('minLength', '8'),
            'message' => 'El usuario debe tener al menos 8 caracteres.'
        )
    ),
    'password' => array(
        'required' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Tu password debe tener al menos 8 caracteres.'
        )
    )
	);
	
	public function beforeSave($options = array()) {
		if(!empty($this->data['User']['password'])) {
			$this->data['User']['password'] = sha1($this->data['User']['password']);
		}
    	return true;
	}
	
	public $hasMany = 'Page';
	
	//asociaciones
	
}