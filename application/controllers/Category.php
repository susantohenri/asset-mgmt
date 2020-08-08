<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Categories';
		parent::__construct();
	}

}