<?php
App::uses('AppController', 'Controller');
/**
 * Responses Controller
 *
 * @property Response $Response
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ResponsesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');
	public $hasMany = array( 'Annotation' );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Response->recursive = 0;
		$this->set('responses', $this->Paginator->paginate());
		$this->set('_serialize', array('responses'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
		$this->set('response', $this->Response->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Response->create();
			if ($this->Response->save($this->request->data)) {
				$this->Session->setFlash(__('The response has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
			}
			$categories = $this->Response->Category->find('list');
			$this->set(compact('categories'));
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Response->save($this->request->data)) {
				$this->Session->setFlash(__('The response has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
			}
		} else {
			$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
			$this->request->data = $this->Response->find('first', $options);
		}
		$categories = $this->Response->Category->find('list');
		$this->set(compact('categories'));	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Response->id = $id;
		if (!$this->Response->exists()) {
			throw new NotFoundException(__('Invalid response'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Response->delete()) {
			$this->Session->setFlash(__('The response has been deleted.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
		} else {
			$this->Session->setFlash(__('The response could not be deleted. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Response->recursive = 0;
		$this->set('responses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
		$this->set('response', $this->Response->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Response->create();
			if ($this->Response->save($this->request->data)) {
				$this->Session->setFlash(__('The response has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Response->exists($id)) {
			throw new NotFoundException(__('Invalid response'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Response->save($this->request->data)) {
				$this->Session->setFlash(__('The response has been saved.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
			}
		} else {
			$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
			$this->request->data = $this->Response->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Response->id = $id;
		if (!$this->Response->exists()) {
			throw new NotFoundException(__('Invalid response'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Response->delete()) {
			$this->Session->setFlash(__('The response has been deleted.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-success'
));
		} else {
			$this->Session->setFlash(__('The response could not be deleted. Please, try again.'), 'alert', array(
	'plugin' => 'BoostCake',
	'class' => 'alert-danger'
));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
* generate_response method
*
* @throws NotFoundException
* @param string $ids
* @return void
*/
	public function generate_response($ids = null) {
		$idArray = explode(",", $ids);
		$annotations = array();
		$responses = array();
		$output = "";

		$annotationCount = 1;
		foreach ($idArray as $id) {
			if (!$this->Response->exists($id)) {
				throw new NotFoundException(__('Invalid response'));
			}
			$options = array('conditions' => array('Response.' . $this->Response->primaryKey => $id));
			$response = $this->Response->find('first', $options);

			foreach ($response['Annotation'] as $annotation) {
				$annotation['enum'] = $annotationCount;
				array_push($annotations, $annotation);
				$response['Response']['body'] = str_replace("{" . $annotation['label'] . "}", "[" . $annotation['enum'] . "]", $response['Response']['body']);
				$annotationCount += 1;
			}
			array_push($responses, $response);
		}

		$responseCount = 1;
		foreach ($responses as $response) {
			$output = $output . $responseCount . ". " . $response['Response']['body'] . "\n\n";
			$responseCount += 1;
		}
		if (sizeof($annotations) > 0) {
			$output = $output . "\n----------------------------------------\n\n";
			foreach ($annotations as $annotation) {
				$output = $output . "[" . $annotation['enum'] . "]: " . $annotation['body'] . "\n";
			}
		}

		$this->set('generated', $output);
		$this->set('_serialize', array('generated'));
	}
}
