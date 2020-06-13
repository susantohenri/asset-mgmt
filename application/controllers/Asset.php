<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Assets';
		parent::__construct();
	}

	function check ($barcode) {
		$found = $this->Assets->findOne (array('AssetCode' => $barcode));
		if (!$found) echo site_url ("Asset/create_asset/{$barcode}");
		else echo site_url ("Asset/read/{$found['uuid']}");
	}

	function scan () {
		$vars = array();
		$vars['page_name'] = 'scan';
		$vars['js'] = array('quagga.min.js', 'scan.js');
		$this->loadview('index', $vars);
	}

	function create_asset ($assetCode) {
		$model= $this->model;
		$vars = array();
		$vars['page_name'] = 'form';
		$vars['form']     = $this->$model->getForm();
		foreach ($vars['form'] as $index => $field) {
			if ('AssetCode' === $field['name']) {
				$vars['form'][$index]['value'] = $assetCode;
			}
		}
		$vars['subform'] = $this->$model->getFormChild();
		$vars['uuid'] = '';
		$vars['js'] = array(
		  'moment.min.js',
		  'bootstrap-datepicker.js',
		  'daterangepicker.min.js',
		  'select2.full.min.js',
		  'form.js'
		);
		$this->loadview('index', $vars);
	  }
}