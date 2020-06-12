<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Assets';
		parent::__construct();
	}

}