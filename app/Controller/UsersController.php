<?php 
class UsersController extends AppController {
	public function register() {
		if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Gracias por registrarte, un correo electronico se a enviado para que verifiques tu cuenta.', 'infos');
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
            }
        }
	}
	public function login() {
		if ($this->request->is('post')) {
			$logueado = $this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['username'], 'password' => sha1($this->request->data['User']['password']), 'active' => 1)));
            if (isset($logueado['User']['username']) && !empty($logueado['User']['username'])) {
                $this->Session->setFlash('Bienvenido de nuevo '.$logueado['User']['username'].'.', 'infos');
				$this->Session->write('User.id', $logueado['User']['id']);
				$this->Session->write('User.username', $logueado['User']['username']);
				$this->Session->write('User.email', $logueado['User']['email']);
				$this->Session->write('User.rol', $logueado['User']['rol']);
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
            } else {
            	$this->Session->setFlash('El usuario o el password ingresados son incorrectos.', 'alerts');
            }
        }
	}
	public function logout() {
		$this->Session->destroy();
		$this->Session->setFlash('La sesion se ha cerrado, te esperamos de vuelta.', 'infos');
		$this->redirect(array('controller' => 'pages', 'action' => 'index'));
	}
	//CRUD de Administración
	public function admin() {
		parent::only_admin();
		$this->Paginator->settings = array('limit' => 1, 'order' => array('User.modified' => 'desc'));
		$this->set('users', $this->Paginator->paginate('User'));
	}
	public function create() {
		parent::only_admin();
		if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('El usuario se ha creado de manera correcta.', 'infos');
                $this->redirect(array('action' => 'admin'));
            }
        }
	}
	public function update($id = null) {
		parent::only_admin();
		$this->User->id = $id;
		if ($this->request->is('get')) {
	        $this->request->data = $this->User->read();
	    } else {
	    	//subir archivo
			if($this->request->data['User']['archivo']['size'] < 1000000 && ($this->request->data['User']['archivo']['type'] == 'image/jpeg' || $this->request->data['User']['archivo']['type'] == 'image/png')) {
				$nombrefile = "usuario_".$this->request->data['User']['username']."".strrchr($this->request->data['User']['archivo']['name'],'.');
				move_uploaded_file($this->request->data['User']['archivo']['tmp_name'], 'uploads/'.$nombrefile);
				$this->request->data['User']['avatar'] = $nombrefile;
			}
			//camabiar password
	    	if(!empty($this->request->data['User']['new_password'])){
	    		$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
	    	}
	        if ($this->User->save($this->request->data)) {
	            $this->Session->setFlash('El usuario se ha editado de manera correcta.', 'infos');
	            $this->redirect(array('action' => 'admin'));
	        }
	    }
	}
	public function destroy($id = null) {
		parent::only_admin();
		if ($this->User->delete($id)) {
        $this->Session->setFlash('El usuario con id: ' . $id . ' ha sido eliminado.', 'alerts');
        $this->redirect(array('action' => 'admin'));
    	}
	}
}