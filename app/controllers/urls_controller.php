<?php
class UrlsController extends AppController {

	var $name = 'Urls';
	var $helpers = array('GoogleCharts');
	var $components = array('Geoip');

	function index() {
		$this->Url->recursive = 0;
		$this->set('urls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid url', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('url', $this->Url->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			if ($this->Url->save($this->data)) {
				$id = $this->Url->saveHashed();
				$url = $this->Url->find('first', array('conditions' => array('Url.id' => $id)));
				$this->set('hash', $url['Url']['hash']);
				$this->render('added');
			} else {
				$this->Session->setFlash(__('The url could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Url->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid url', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Url->save($this->data)) {
				$this->Session->setFlash(__('The url has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The url could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Url->read(null, $id);
		}
		$users = $this->Url->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for url', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Url->delete($id)) {
			$this->Session->setFlash(__('Url deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Url was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function show($id = null) {

		if ($id == null) {
			$this->redirect(array('action'=>'add'));
		}

		$url = $this->Url->find('first', array(
			'conditions' => array('hash' => $id),
			'fields' => array('original')
		));
		if($url != null) {
			$this->loadModel('Stat');
			$this->Stat->addStat(array(
				'country' => $this->Geoip->nameByIp($_SERVER['REMOTE_ADDR']),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'time' => date('Y-m-d\TH:i:s.uP', time()),
				'useragent' => $_SERVER['HTTP_USER_AGENT'],
				'referer' => (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'N/A')
			), $id);
			$this->redirect($url['Url']['original']);
		}

		$this->Session->setFlash('URL Not found', true);
		$this->redirect(array('action' => 'index'));
	}
}
?>