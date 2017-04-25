<?php
class DiaChi1{
	const COLLECTION = 'diachi1';
	private $_mongo;
	private $_collection;

	public $id = '';
	public $ten = ''; //Cấp quốc gia
	public $id_parent = '';
	
	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(DiaChi1::COLLECTION);
	}

	public function insert(){
		$query = array('_id' => new MongoId($this->id), 'ten' => $this->ten, 'id_parent' => $this->id_parent ? new MongoId($this->id_parent) : '');
		return $this->_collection->insert($query);
	}
}
?>