<?php defined('SYSPATH') or die('No direct access allowed.');

class Datasource_Hybrid_Field_Primitive_String extends Datasource_Hybrid_Field_Primitive {
	
	protected $_use_as_document_id = TRUE;
	
	protected $_props = array(
		'default' => NULL,
		'length' => 32,
		'regexp' => NULL,
		'use_filemanager' => FALSE
	);
	
	public function set( array $data )
	{
		$data['use_filemanager'] = !empty($data['use_filemanager']) ? TRUE : FALSE;
		
		return parent::set( $data );
	}
	
	public function get_type() 
	{
		if($this->length < 1 OR $this->length > 255)
		{
			$this->length = 32;
		}

		return 'VARCHAR (' . $this->length . ') NOT NULL';
	}
}