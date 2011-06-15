<?php
App::import('Vendor', 'GeoIP', array('file' => 'geoip/geoip.inc'));

class GeoipComponent extends Object {

	function nameByIp($ip)
	{
		$gi = geoip_open('files/GeoLiteCity.dat', GEOIP_STANDARD);

		$country = geoip_country_name_by_addr($gi, $ip);

		if($country == '')
			return 'Unknown';

		return $country;
	}

}
?>
