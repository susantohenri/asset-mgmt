<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'asset';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'Name', 'sTitle' => 'Name'),
	  (object) array('mData' => 'AssetCode', 'visible' => false),
	  (object) array('mData' => 'Model', 'visible' => false),
	  (object) array('mData' => 'InvoiceNumber', 'visible' => false),
	  (object) array('mData' => 'Category', 'visible' => false),
	  (object) array('mData' => 'DateAcquired', 'visible' => false),
	  (object) array('mData' => 'DateDisposed', 'visible' => false),
	  (object) array('mData' => 'DisposalMethod', 'visible' => false),
	  (object) array('mData' => 'PhotoOfItem', 'visible' => false),
	  (object) array('mData' => 'PhotoOfSerialNumber', 'visible' => false),
	  (object) array('mData' => 'Location', 'visible' => false),
	  (object) array('mData' => 'Active', 'visible' => false),
	  (object) array('mData' => 'Notes', 'visible' => false)
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
					  'type' => 'file',
				      'width' => 2,
		      		'label'=> 'Photo of Item',
					  ),
        array (
				      'name' => 'PhotoOfSerialNumber',
					  'type' => 'file',
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

  function csv () {
	  $fields = array ('AssetCode', 'Name', 'Model', 'InvoiceNumber', 'Category', 'DateAcquired', 'DateDisposed', 'DisposalMethod', 'Location', 'Active', 'Notes');
	  $records= $this->db
		  ->select ("
			AssetCode,
			asset.Name,
			Model,
			InvoiceNumber,
			category.Name AS Category,
			DateAcquired,
			DateDisposed,
			disposalmethod.Name AS DisposalMethod,
			location.Name AS Location,
			Active,
			Notes
		  ")
		  ->from ('asset')
		  ->join ('category', 'category.uuid = asset.Category', 'LEFT')
		  ->join ('disposalmethod', 'disposalmethod.uuid = asset.DisposalMethod', 'LEFT')
		  ->join ('location', 'location.uuid = asset.Location', 'LEFT')
		  ->get()
		  ->result_array();

	  return array_merge (array ($fields), $records);
  }

  function pdf () {
	return $this->db
		->select ("
			AssetCode,
			asset.Name,
			Model,
			InvoiceNumber,
			category.Name AS Category,
			DateAcquired,
			DateDisposed,
			disposalmethod.Name AS DisposalMethod,
			location.Name AS Location,
			Active,
			Notes,
			PhotoOfItem,
			PhotoOfSerialNumber
		")
		->from ('asset')
		->join ('category', 'category.uuid = asset.Category', 'LEFT')
		->join ('disposalmethod', 'disposalmethod.uuid = asset.DisposalMethod', 'LEFT')
		->join ('location', 'location.uuid = asset.Location', 'LEFT')
		->get()
		->result();
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
	  ->select("{$this->table}.AssetCode")
	  ->select("{$this->table}.Name")
	  ->select("{$this->table}.Model")
	  ->select("{$this->table}.InvoiceNumber")
	  ->select("category.Name AS Category", false)
	  ->select("{$this->table}.DateAcquired")
	  ->select("{$this->table}.DateDisposed")
	  ->select("disposalmethod.Name AS DisposalMethod", false)
	  ->select("{$this->table}.PhotoOfItem")
	  ->select("{$this->table}.PhotoOfSerialNumber")
	  ->select("location.Name AS Location", false)
	  ->select("{$this->table}.Active")
	  ->select("{$this->table}.Notes")
	  ->join ('category', 'category.uuid = asset.Category', 'LEFT')
	  ->join ('disposalmethod', 'disposalmethod.uuid = asset.DisposalMethod', 'LEFT')
	  ->join ('location', 'location.uuid = asset.Location', 'LEFT')
	  ;
    return parent::dt();
  }

  function save ($record) {
    foreach ($record as $field => &$value) {
      if (is_array($value)) $value = implode(',', $value);
      else if (strpos($value, '[comma-replacement]') > -1) $value = str_replace('[comma-replacement]', ',', $value);
    }

	foreach (array('PhotoOfItem', 'PhotoOfSerialNumber') as $field_name) {
		if (!self::fileUploadIsEmpty ($field_name)) $record[$field_name] = self::saveFile ($field_name, $record['AssetCode']);
	}

	return isset ($record['uuid']) ? $this->update($record) : $this->create($record);
  }

  private function fileUploadIsEmpty ($field_name) {
	  return strlen ($_FILES[$field_name]['name']) < 1;
  }

  private function getFileExtension ($field_name) {
	  return strtolower (pathinfo ($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
  }

  private function fileIsPhoto ($field_name) {
	  if (getimagesize ($_FILES[$field_name]['tmp_name'])) return true;
	  else return false;
  }

  private function saveFile ($field_name, $asset_code) {
	  if (!$this->fileIsPhoto ($field_name)) return false;
	  $extension = self::getFileExtension ($field_name);
	  $new_file_location = "photos/{$field_name}_{$asset_code}.{$extension}";
	  if (file_exists ($new_file_location)) unlink ($new_file_location);
	  move_uploaded_file($_FILES[$field_name]['tmp_name'], $new_file_location);
	  return $new_file_location;
  }
}