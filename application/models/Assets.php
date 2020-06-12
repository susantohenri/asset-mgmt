<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'asset';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'AssetCode', 'sTitle' => 'Asset Code'),

    );
    $this->form = array (
        array (
				      'name' => 'AssetCode',
				      'width' => 2,
		      		'label'=> 'Asset Code',
					  ),
        array (
				      'name' => 'Name',
				      'width' => 2,
		      		'label'=> 'Name',
					  ),
        array (
				      'name' => 'Model',
				      'width' => 2,
		      		'label'=> 'Model',
					  ),
        array (
				      'name' => 'InvoiceNumber',
				      'width' => 2,
		      		'label'=> 'Invoice Number',
					  ),
        array (
		      'name' => 'Category',
		      'label'=> 'Category',
		      'options' => array(),
		      'width' => 2,
		      'attributes' => array(
		        array('data-autocomplete' => 'true'),
		        array('data-model' => 'Categories'),
		        array('data-field' => 'Name')
			    )),
        array (
		      'name' => 'DateAcquired',
		      'label'=> 'Date Acquired',
		      'width' => 2,
		      'attributes' => array(
		        array('data-date' => 'datepicker')
			    )),
        array (
		      'name' => 'DateDisposed',
		      'label'=> 'Date Disposed',
		      'width' => 2,
		      'attributes' => array(
		        array('data-date' => 'datepicker')
			    )),
        array (
		      'name' => 'DisposalMethod',
		      'label'=> 'Disposal Method',
		      'options' => array(),
		      'width' => 2,
		      'attributes' => array(
		        array('data-autocomplete' => 'true'),
		        array('data-model' => 'DisposalMethods'),
		        array('data-field' => 'Name')
			    )),
        array (
				      'name' => 'PhotoOfItem',
				      'width' => 2,
		      		'label'=> 'Photo of Item',
					  ),
        array (
				      'name' => 'PhotoOfSerialNumber',
				      'width' => 2,
		      		'label'=> 'Photo of Serial Number',
					  ),
        array (
		      'name' => 'Location',
		      'label'=> 'Location',
		      'options' => array(),
		      'width' => 2,
		      'attributes' => array(
		        array('data-autocomplete' => 'true'),
		        array('data-model' => 'Locations'),
		        array('data-field' => 'Name')
			    )),
        array (
				      'name' => 'Active',
				      'label'=> 'Active',
				      'width' => 2,
		      		'options' => array(
                array('text' => 'Yes', 'value' => 'Yes'),
                array('text' => 'No', 'value' => 'No'),
				      )
					  ),
        array (
				      'name' => 'Notes',
				      'width' => 2,
		      		'label'=> 'Notes',
					  ),
    );
    $this->childs = array (
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('asset.AssetCode');
    return parent::dt();
  }

}