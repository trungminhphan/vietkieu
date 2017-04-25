<?php
class DienDiDinhCu{
	const COLLECTION = 'diendidinhcu';
	private $_mongo;
	private $_collection;
	public $id = '';
	public $ten = '';

	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(DienDiDinhCu::COLLECTION);
	}

	public function get_one(){
		return $this->_collection->findOne(array('_id'=> new MongoId($this->id)));
	}
	public function get_one_to_ten(){
		return $this->_collection->findOne(array('ten'=> $this->ten));
	}

	public function get_id($ten){
		if($ten & trim($ten) !=''){
			$query = array('_id' => true);
			$condition = array('ten' => new MongoRegex('/' . $ten . '/i'));
			$result = $this->_collection->findOne($condition, $query);
			if($result['_id']) return $result['_id']; else return '';
		} else {
			return '';
		}
	}

	public function get_all_list(){
		return $this->_collection->find()->sort(array('ten'=> 1));
	}

	public function get_id_to_ten(){
		$result = $this->_collection->findOne(array('ten'=> new MongoRegex('/' . $this->ten .'/i')), array('_id' => true));
		if($result['_id']) return $result['_id'];
		else return false;
	}

	public function get_all_list_to_ten(){
		return $this->_collection->find(array('ten'=> new MongoRegex('/' . $this->ten .'/i')))->sort(array('_id'=> -1));
	}

	public function insert(){
		return $this->_collection->insert(array('_id'=> new MongoId($this->id), 'ten'=>$this->ten));
	}

	public function delete(){
		return $this->_collection->remove(array('_id'=> new MongoId($this->id)));
	}

	public function edit(){
		return $this->_collection->update(array('_id'=> new MongoId($this->id)), array('ten'=> $this->ten));
	}

	public function check_exists(){
		$query = array('ten' => $this->ten);
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
}
?>