<?php
class AdminElectionsController extends AppController {

	var $name = 'PublicElections';
	var $components = array(
		    'Auth'
		);
	var $uses = array('Election');
	function admin_index() {
		$this->Election->recursive = 0;
		$this->set('elections', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid election', true));
			$this->redirect('/myAccount');
		}
		$this->set('election', $this->Election->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Election->create();
			if ($this->Election->save($this->data)) {
				$this->Session->setFlash(__('The election has been saved', true));
				$this->redirect('/myAccount');
			} else {
				$this->Session->setFlash(__('The election could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Election->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid election', true));
			$this->redirect('/myAccount');
		}
		if (!empty($this->data)) {
			if ($this->Election->save($this->data)) {
				$this->Session->setFlash(__('The election has been saved', true));
				$this->redirect('/myAccount');
			} else {
				$this->Session->setFlash(__('The election could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Election->read(null, $id);
		}
		$users = $this->Election->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for election', true));
			$this->redirect('/myAccount');
		}
		if ($this->Election->delete($id)) {
			$this->Session->setFlash(__('Election deleted', true));
			$this->redirect('/myAccount');
		}
		$this->Session->setFlash(__('Election was not deleted', true));
		$this->redirect('/myAccount');
	}
}
?>
