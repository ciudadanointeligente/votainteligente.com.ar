<?php
class UserElectionsController extends AppController {

	var $name = 'UserElections';
	var $components = array(
	'Auth'=>array(
	    'allowedActions' => array('index','view')
	));
	var $uses = array('Election');

	function add() {
		if (!empty($this->data)) {
			$this->Election->create();
			if ($this->Election->save($this->data)) {
				$this->Session->setFlash(__('The election has been saved', true));
				$this->redirect(array('controller'=>'myAccount','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The election could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid election', true));
			$this->redirect('/myAccount');
		}
		if (!$this->amITheOwner($id)) {
		    $this->Session->setFlash(__('You\'re not the owner of this election', true));
		    $this->redirect('/myAccount');
		}
		else {
		    /*
		     * This else is not necesary
		     * after redirecting it stops interpreting the rest of this function
		     * but this is not the case when testing this function
		     * in wich case it doesn't stop
		     */
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
	}
	function amITheOwner($idElection){
	    $myId = $this->Auth->user('id');
	    return $this->Election->AmIOwnerOfThisElection($idElection,$myId);
	}
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for election', true));
			$this->redirect('/myAccount');
		}
		if (!$this->amITheOwner($id)) {
		    $this->Session->setFlash(__('You\'re not the owner of this election', true));
		    $this->redirect('/myAccount');
		    $this->_stop();
		}
		else {
		    /*
		     * This else is not necesary
		     * after redirecting it stops interpreting the rest of this function
		     * but this is not the case when testing this function
		     * in wich case it doesn't stop
		     */
		    if ($this->Election->delete($id)) {
			$this->Session->setFlash(__('Election deleted', true));
			$this->redirect('/myAccount');
		    }
		    $this->Session->setFlash(__('Election was not deleted', true));
		    $this->redirect('/myAccount');
		}


	}
}

?>
