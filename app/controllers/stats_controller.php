<?php
class StatsController extends AppController {

	var $name = 'Stats';
	var $helpers = array('GoogleCharts');

	function index($id) {
		
		if(!$id){
			$this->Session->setFlash('No stats for this Quri', true);
			$this->redirect(array('controller' => 'url', 'action' => 'add'));
		}
		$this->loadModel('Url');
		$url = $this->Url->find('first', array('fields' => array('id'), 'conditions' => array('hash' => $id)));
		$id = $url['Url']['id'];
		$stats = $this->Stat->find('all', array('conditions' => array('url_id' => $id)));

		if(!$stats) {
			$this->Session->setFlash('No stats yet for that URL');
			$this->Redirect(array('controller' => 'url', 'action' => 'add'));
		}
		$this->Stat->recursive = 0;
		$this->set(array(
			'stats' => $stats,
			'clicks' => $this->getClicks($id),
			'uniqueClicks' => $this->getUniqueClicks($id),
			'countryPie' => $this->getCountryPieData($id),
			'useragentPie' => $this->getUserAgentPieData($id)
		));
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