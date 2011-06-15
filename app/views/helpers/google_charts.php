<?php

class GoogleChartsHelper extends AppHelper {
	var $helpers = array('Html');
	var $apiUrl = 'https://chart.googleapis.com/chart?';

	function _getQueryString($queryParams) {
        return implode('&', $queryParams);
    }

    function qr($options = array()){
        $str = '';

        $defaults = array(
            'chof' => 'png',
            'cht' => 'qr',
            'chs' => '150x150',
            'chl' => 'Hello world!',
            'choe' => 'UTF-8',
            'chld' => 'L|4'
        );

        $options = array_merge($defaults, $options);

        $queryParams = array();
        foreach ($options as $key => $value) {
            $queryParams[] = $key . '=' . urlencode($value);
        }

        $str = $this->Html->image($this->apiUrl . $this->_getQueryString($queryParams));

        return $this->output($str);
	}

	function pie($options = array(), $data = array()) {
        $str = '';
		$options['chl'] = '';	// Legend
		$options['chd'] = 't:';	// Data

		// Not much here, most is dynamic
		$defaults = array(
            'cht' => 'p',
            'chs' => '300x200'
        );

		//Create data and legend strings
		foreach($data as $key => $val) {
			$options['chl'] .= $key . '|';
			$options['chd'] .= $val . ',';
		}

		// Trim trailing seperator from legend and data
		$options['chl'] = substr($options['chl'], 0, -1);
		$options['chd'] = substr($options['chd'], 0, -1);

        $options = array_merge($defaults, $options);

        $queryParams = array();
        foreach ($options as $key => $value) {
            $queryParams[] = $key . '=' . urlencode($value);
        }

        $str = $this->Html->image($this->apiUrl . $this->_getQueryString($queryParams));

        return $this->output($str);


	}
}
?>

