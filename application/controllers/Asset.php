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

	  function excel () {
		$filename = 'Export-Assets.csv';
		$delimiter = ',';
		$array = $this->Assets->csv();
		$f = fopen('php://memory', 'w');
		foreach ($array as $line) { 
			fputcsv($f, $line, $delimiter); 
		}
		fseek($f, 0);
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'";');
		fpassthru($f);
	  }

	  function pdf () {
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = 'Export-Assets.pdf';

		$data = array ('records' => $this->Assets->pdf ());
		// $this->pdf->load_view('pdf', $data);

		$this->load->view('pdf', $data);
		$html = $this->output->get_output();
		$this->pdf->load_html($html);

		$this->pdf->render();
		$this->pdf->stream('Export-Assets.pdf');
	  }

	  function html () {
		$data['records'] = array_map (function ($record) {
			if (strlen ($record->PhotoOfItem) && '0' !== $record->PhotoOfItem) {
				$record->PhotoOfItem = base_url ($record->PhotoOfItem);
			}
			if (strlen ($record->PhotoOfSerialNumber) && '0' !== $record->PhotoOfSerialNumber) {
				$record->PhotoOfSerialNumber = base_url ($record->PhotoOfSerialNumber);
			}
			return $record;
		}, $this->Assets->pdf ());
		$this->load->view('pdf', $data);
	  }
}