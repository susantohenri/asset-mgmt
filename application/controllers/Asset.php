<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Assets';
		parent::__construct();
	}

	function check ($barcode) {
		$found = $this->Assets->findOne (array('AssetCode' => $barcode));
		if (!$found) echo site_url ('Asset/create');
		else echo site_url ("Asset/read/{$found['uuid']}");
	}

	function scan () {
		$vars = array();
		$vars['page_name'] = 'scan';
		$vars['js'] = array('quagga.min.js', 'scan.js');
		$this->loadview('index', $vars);
	}
}