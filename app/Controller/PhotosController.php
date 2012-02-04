<?php
App::uses('AppController', 'Controller');
/**
 * Photos Controller
 *
 * @property Photo $Photo
 */
class PhotosController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		$this->set('photo', $this->Photo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data('Photo.user_id', $this->Auth->user('id'));
			if ($this->Photo->add($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved'), 'sucess');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'), 'error');
			}
		}
		$users = $this->Photo->User->find('list');
		$labels = $this->Photo->Label->find('list');
		$this->set(compact('users', 'labels'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Photo->save($this->request->data)) {
				$this->Session->setFlash(__('The photo has been saved'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.'), 'error');
			}
		} else {
			$this->request->data = $this->Photo->read(null, $id);
		}
		$users = $this->Photo->User->find('list');
		$labels = $this->Photo->Label->find('list');
		$this->set(compact('users', 'labels'));
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
		$this->Photo->id = $id;
		if (!$this->Photo->exists()) {
			throw new NotFoundException(__('Invalid photo'));
		}
		if ($this->Photo->delete()) {
			$this->Session->setFlash(__('Photo deleted'), 'sucess');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}
