<?php

App::import('Sanitize');

class UrlsController extends AppController {

	var $name = 'Urls';
	var $helpers = array('GoogleCharts');
	var $components = array('Geoip');

	function view($hash = null) {
		if (!$hash) {
			$this->Session->setFlash(__('Invalid url', true));
			$this->redirect(array('action' => 'add'));
		}
		$this->set('url', $this->Url->find('first', array('conditions' => array('hash' => $hash))));
	}

	function add() {
		$this->layout = 'home';
		if (!empty($this->data)) {
			if(!stristr($this->data['Url']['original'], 'http://') && !stristr($this->data['Url']['original'], 'https://')) {
				$this->data['Url']['original'] = 'http://' . $this->data['Url']['original'];
			}
			$this->data['Url']['original'] = Sanitize::paranoid($this->data['Url']['original'], array('/', ':', '.', '&', '-', '_', '@'));
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

	function show($hash = null) {

		if ($hash == null) {
			$this->redirect(array('action'=>'add'));
		}

		$url = $this->Url->find('first', array(
			'conditions' => array('hash' => $hash),
			'fields' => array('original', 'id')
		));
		if($url != null) {
			$this->loadModel('Stat');
			$this->Stat->addStat(array(
				'country' => $this->Geoip->nameByIp($_SERVER['REMOTE_ADDR']),
				'ip' => $_SERVER['REMOTE_ADDR'],
				'time' => date('Y-m-d\TH:i:s.uP', time()),
				'useragent' => $_SERVER['HTTP_USER_AGENT'],
				'referer' => (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'N/A')
			), $url['Url']['id']);
			$this->redirect($url['Url']['original']);
		}

		$this->Session->setFlash('The reqested Quri has no statistics at this time', true);
		$this->redirect(array('action' => 'add'));
	}
}
?>