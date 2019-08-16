<?php defined('BASEPATH') OR exit('No direct script access allowed');

class entityNames extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'tableName';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
    );
    $this->form  = array ();

    $this->form[]= array(
    	'name' => 'dummyName',
    	'label'=> 'dummyLabel'
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders");
    return parent::dt();
  }

}