<?php
App::uses('AppController', 'Controller');
/**
 * Labels Controller
 *
 * @property Label $Label
 */
class LabelsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Label->recursive = 0;
		$this->set('labels', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		$this->set('label', $this->Label->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Label->create();
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'), 'error');
			}
		}
		$photos = $this->Label->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Label->read(null, $id);
		}
		$photos = $this->Label->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Label->id = $id;
		if (!$this->Label->exists()) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->Label->delete()) {
			$this->Session->setFlash(__('Label deleted'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Label was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}
