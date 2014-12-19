<?php
App::uses('AppController', 'Controller');
/**
 * Annotations Controller
 *
 * @property Annotation $Annotation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AnnotationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Annotation->recursive = 0;
		$this->set('annotations', $this->Paginator->paginate());
		$this->set('_serialize', array('annotations'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Annotation->exists($id)) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		$options = array('conditions' => array('Annotation.' . $this->Annotation->primaryKey => $id));
		$this->set('annotation', $this->Annotation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Annotation->create();
			if ($this->Annotation->save($this->request->data)) {
				$this->Session->setFlash(__('The annotation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The annotation could not be saved. Please, try again.'));
			}
		}
		$responses = $this->Annotation->Response->find('list');
		$this->set(compact('responses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Annotation->exists($id)) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Annotation->save($this->request->data)) {
				$this->Session->setFlash(__('The annotation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The annotation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Annotation.' . $this->Annotation->primaryKey => $id));
			$this->request->data = $this->Annotation->find('first', $options);
		}
		$responses = $this->Annotation->Response->find('list');
		$this->set(compact('responses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Annotation->id = $id;
		if (!$this->Annotation->exists()) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Annotation->delete()) {
			$this->Session->setFlash(__('The annotation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The annotation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Annotation->recursive = 0;
		$this->set('annotations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Annotation->exists($id)) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		$options = array('conditions' => array('Annotation.' . $this->Annotation->primaryKey => $id));
		$this->set('annotation', $this->Annotation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Annotation->create();
			if ($this->Annotation->save($this->request->data)) {
				$this->Session->setFlash(__('The annotation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The annotation could not be saved. Please, try again.'));
			}
		}
		$responses = $this->Annotation->Response->find('list');
		$this->set(compact('responses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Annotation->exists($id)) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Annotation->save($this->request->data)) {
				$this->Session->setFlash(__('The annotation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The annotation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Annotation.' . $this->Annotation->primaryKey => $id));
			$this->request->data = $this->Annotation->find('first', $options);
		}
		$responses = $this->Annotation->Response->find('list');
		$this->set(compact('responses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Annotation->id = $id;
		if (!$this->Annotation->exists()) {
			throw new NotFoundException(__('Invalid annotation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Annotation->delete()) {
			$this->Session->setFlash(__('The annotation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The annotation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
