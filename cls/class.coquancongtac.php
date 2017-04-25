<?php
class CoQuanCongTac{
	const COLLECTION = 'coquancongtac';
	private $_mongo;
	private $_collection;
	public $id = '';
	public $ten = '';
	public $loaicoquan = '';

	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(CoQuanCongTac::COLLECTION);
	}

	public function get_one(){
		return $this->_collection->findOne(array('_id'=> new MongoId($this->id)));
	}

	public function get_all_list(){
		return $this->_collection->find()->sort(array('_id'=> -1));
	}

	public function get_list_condition($query){
		return $this->_collection->find($query)->sort(array('_id'=> -1));
	}

	public function get_distinct_loaicoquan(){
		return $this->_collection->distinct('loaicoquan');
	}	

	public function insert(){
		$query = array('ten' => $this->ten, 'loaicoquan' => $this->loaicoquan ? $this->loaicoquan : 'Khác');
		return $this->_collection->insert($query);
	}

	public function delete(){
		return $this->_collection->remove(array('_id'=> new MongoId($this->id)));
	}

	public function edit(){
		$query = array('$set' => array('ten'=> $this->ten, 'loaicoquan' => $this->loaicoquan));
		$condition = array('_id'=> new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function check_exists(){
		$query = array('ten' => $this->ten);
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
	
	public function get_id($ten){
		if($ten && trim($ten) !=''){
			$query = array('_id' => true);
			$condition = array('ten' => new MongoRegex('/' . $ten . '/i'));
			$result = $this->_collection->findOne($condition, $query);
			if($result['_id']) return $result['_id']; else return '';
		} else {
			return true;
		}
	}
}
?>