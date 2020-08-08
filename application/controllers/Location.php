<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Locations';
		parent::__construct();
	}

}