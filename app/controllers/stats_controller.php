<?php
class StatsController extends AppController {

	var $name = 'Stats';
	var $helpers = array('GoogleCharts');

	function index($id) {
		
		if(!$id){
			$this->Session->setFlash('No stats for this Quri', true);
			$this->redirect(array('controller' => 'urls', 'action' => 'index'));
		}
		$stats = $this->Stat->find('all', array('conditions' => array('url_id' => $id)));
		$this->Stat->recursive = 0;
		$this->set(array(
			'stats' => $stats,
			'clicks' => $this->getClicks($id),
			'uniqueClicks' => $this->getUniqueClicks($id),
			'countryPie' => $this->getCountryPieData($id),
			'useragentPie' => $this->getUserAgentPieData($id)
		));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stat', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stat', $this->Stat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Stat->create();
			if ($this->Stat->save($this->data)) {
				$this->Session->setFlash(__('The stat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stat could not be saved. Please, try again.', true));
			}
		}
		$urls = $this->Stat->Url->find('list');
		$this->set(compact('urls'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stat', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Stat->save($this->data)) {
				$this->Session->setFlash(__('The stat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stat could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Stat->read(null, $id);
		}
		$urls = $this->Stat->Url->find('list');
		$this->set(compact('urls'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stat', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Stat->delete($id)) {
			$this->Session->setFlash(__('Stat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stat was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	/**
	 *	Return the total number of clicks on a short URL
	 *
	 * @param int $id
	 * @return int
	 */
	function getClicks($id)
	{
		$clicks = $this->Stat->find('count', array('conditions' => array(
			'url_id' => $id
		)));

		return $clicks;
	}

	/**
	 *	Returns the number of unique clicks on a short URL, unique clicks are worked out via IP
	 *
	 * @param int $id
	 * @return int
	 */
	function getUniqueClicks($id) {
		$clicks = $this->Stat->find('count', array('fields' => 'DISTINCT ip', 'conditions' => array(
			'url_id' => $id
		)));

		return $clicks;
	}

	function getCountryPieData($id) {
		$countryCount = array();
		$countries = $this->Stat->find('all', array('fields' => 'DISTINCT country', 'conditions' => array('url_id' => $id)));

		foreach($countries as $country) {
			$hitCount = $this->Stat->find('count', array('conditions' => array('url_id' => $id, 'country' => $country['Stat']['country'])));
			$countryCount[$country['Stat']['country'] . ' (' . $hitCount . ')'] = $hitCount;
		}

		return($countryCount);
	}

	function getUserAgentPieData($id) {
		$useragentCount = array();
		$useragents = $this->Stat->find('all', array('fields' => 'DISTINCT useragent', 'conditions' => array('url_id' => $id)));

		foreach($useragents as $useragent) {
			$hitCount = $this->Stat->find('count', array('conditions' => array('url_id' => $id, 'useragent' => $useragent['Stat']['useragent'])));
			$useragentCount[$useragent['Stat']['useragent'] . ' (' . $hitCount . ')'] = $hitCount;
		}

		return($useragentCount);
	}
}
?>