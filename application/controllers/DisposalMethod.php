<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DisposalMethod extends MY_Controller {

	function __construct ()
	{
		$this->model = 'DisposalMethods';
		parent::__construct();
	}

}