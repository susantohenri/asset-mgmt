<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DisposalMethods extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'disposalmethod';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'Name', 'sTitle' => 'Name'),

    );
    $this->form = array (
        array (
				      'name' => 'Name',
				      'width' => 2,
		      		'label'=> 'Name',
					  ),
    );
    $this->childs = array (
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('disposalmethod.Name');
    return parent::dt();
  }

}