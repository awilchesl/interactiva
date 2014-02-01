<?php
class PagesController extends AppController {
	public function index($perro = null) {
       $this->set('gato', $perro);
    }
	//CRUD de Administración
	public function admin() {
		parent::only_admin();
		$this->set('paginsb', $this->Page->find('all', array('conditions' => array('Page.active' => '0', 'Page.user_id' => $this->Session->read('User.id')))));
		$this->Paginator->settings = array('limit' => 1, 'order' => array('Page.modified' => 'desc'));
		$this->set('pages', $this->Paginator->paginate('Page'));
	}
	public function create() {
		parent::only_admin();
		if ($this->request->is('post')) {
			$this->request->data['Page']['user_id'] = $this->Session->read('User.id');
            if ($this->Page->save($this->request->data)) {
                $this->Session->setFlash('El usuario se ha creado de manera correcta.', 'infos');
                $this->redirect(array('action' => 'admin'));
            }
        }
	}
	public function update($id = null) {
		parent::only_admin();
		$this->Page->id = $id;
		if ($this->request->is('get')) {
	        $this->request->data = $this->Page->read();
	    } else {
	        if ($this->Page->save($this->request->data)) {
	            $this->Session->setFlash('El usuario se ha editado de manera correcta.', 'infos');
	            $this->redirect(array('action' => 'admin'));
	        }
	    }
	}
	public function destroy($id = null) {
		parent::only_admin();
		if ($this->Page->delete($id)) {
        $this->Session->setFlash('El usuario con id: ' . $id . ' ha sido eliminado.', 'alerts');
        $this->redirect(array('action' => 'admin'));
    	}
	}
}