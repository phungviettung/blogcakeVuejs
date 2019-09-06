<?php
App::uses('AppController', 'Controller');
/**
 * DETAIs Controller
 *
 * @property DETAI $DETAI
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DETAIsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DETAI->recursive = 0;
		$this->set('dETAIs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DETAI->exists($id)) {
			throw new NotFoundException(__('Invalid d e t a i'));
		}
		$options = array('conditions' => array('DETAI.' . $this->DETAI->primaryKey => $id));
		$this->set('dETAI', $this->DETAI->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DETAI->create();
			if ($this->DETAI->save($this->request->data)) {
				$this->Session->setFlash(__('The d e t a i has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The d e t a i could not be saved. Please, try again.'));
			}
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
		if (!$this->DETAI->exists($id)) {
			throw new NotFoundException(__('Invalid d e t a i'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DETAI->save($this->request->data)) {
				$this->Session->setFlash(__('The d e t a i has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The d e t a i could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DETAI.' . $this->DETAI->primaryKey => $id));
			$this->request->data = $this->DETAI->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DETAI->id = $id;
		if (!$this->DETAI->exists()) {
			throw new NotFoundException(__('Invalid d e t a i'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DETAI->delete()) {
			$this->Session->setFlash(__('The d e t a i has been deleted.'));
		} else {
			$this->Session->setFlash(__('The d e t a i could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
