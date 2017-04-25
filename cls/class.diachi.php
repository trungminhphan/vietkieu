<?php 
class DiaChi{
	const COLLECTION = 'diachi';
	private $_mongo;
	private $_collection;

	public $id = '';
	public $id_delete = '';
	public $tendiachi = ''; //Cấp quốc gia
	public $k1 = 0;	public $k2 = 0;	public $k3 = 0;	public $k4 = 0;
	
	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(DiaChi::COLLECTION);
	}
	
	public function get_all_list(){
		return $this->_collection->find()->sort(array('tendiachi'=>1));
	}

	public function get_one(){
		return $this->_collection->findOne(array('_id' => new MongoId($this->id)));
	}

	public function get_list_condition($condition){
		return $this->_collection->find($condition);
	}

	public function insert_level1(){
		$query = array('tendiachi' => $this->tendiachi);
		return $this->_collection->insert($query);
	}

	public function insert_level2(){
		$query = array('$push' => array('level2' => array('_id' => new MongoId(), 'tendiachi'=> $this->tendiachi)));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}
	public function insert_level3(){
		$query = array('$push' => array('level2.'.$this->k2.'.level3' => array('_id' => new MongoId(), 'tendiachi'=> $this->tendiachi)));
		$condition = array('level2._id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function insert_level4(){
		$query = array('$push' => array('level2.'.$this->k2.'.level3.'.$this->k3.'.level4' => array('_id' => new MongoId(), 'tendiachi'=> $this->tendiachi)));
		$condition = array('level2.level3._id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}
	public function insert_level5(){
		$query = array('$push' => array('level2.'.$this->k2.'.level3.'.$this->k3.'.level4.'.$this->k4.'.level5' => array('_id' => new MongoId(), 'tendiachi'=> $this->tendiachi)));
		$condition = array('level2.level3.level4._id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function edit_level1(){
		$query = array('$set' => array('tendiachi' => $this->tendiachi));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}
	public function edit_level2(){
		$query = array('$set' => array('level2.'.$this->k2.'.tendiachi' => $this->tendiachi));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function edit_level3(){
		$query = array('$set' => array('level2.'.$this->k2.'.level3.'.$this->k3.'.tendiachi' => $this->tendiachi));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function edit_level4(){
		$query = array('$set' => array('level2.'.$this->k2.'.level3.'.$this->k3.'.level4.'.$this->k4.'.tendiachi' => $this->tendiachi));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function edit_level5(){
		$query = array('$set' => array('level2.'.$this->k2.'.level3.'.$this->k3.'.level4.'.$this->k4.'.level5.'.$this->k5.'.tendiachi' => $this->tendiachi));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function delete_level1(){
		$query = array('_id' => new MongoId($this->id));
		return $this->_collection->remove($query);
	}
	public function delete_level2(){
		$query = array('$pull' => array('level2' => array('_id' => new MongoId($this->id_delete))));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}
	public function delete_level3(){
		$query = array('$pull' => array('level2.'.$this->k2. '.level3' => array('_id' => new MongoId($this->id_delete))));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}	
	public function delete_level4(){
		$query = array('$pull' => array('level2.'.$this->k2. '.level3.'.$this->k3.'.level4' => array('_id' => new MongoId($this->id_delete))));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function delete_level5(){
		$query = array('$pull' => array('level2.'.$this->k2. '.level3.'.$this->k3.'.level4.'.$this->k4.'.level5' => array('_id' => new MongoId($this->id_delete))));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	
	public function tendiachi($arr){
		if($arr[0]) $condition = array('_id' => new MongoId($arr[0]));
		else $condition = array();
		$result = $this->_collection->findOne($condition);
		$cap1='';$cap2='';$cap3='';$cap4='';$cap5='';$cap6='';
		$str_diachi = '';
		if($arr[0] && isset($result['tendiachi'])) $str_diachi = $result['tendiachi'];//$cap1 = $result['tendiachi'];
		if(isset($result['level2']) && $arr[1]){
			foreach ($result['level2'] as $a2) {
				if($arr[1]==$a2['_id']) $str_diachi = $a2['tendiachi'] . ' - ' . $str_diachi;//$cap2 = $a2['tendiachi'];
				if(isset($a2['level3']) && $arr[2]){
					foreach ($a2['level3'] as $a3) {
						if($a3['_id']==$arr[2]) $str_diachi = $a3['tendiachi'] . ' - ' . $str_diachi; //$cap3 = $a3['tendiachi'];
						if(isset($a3['level4']) && $arr[3]){
							foreach ($a3['level4'] as $a4) {
								if($a4['_id']==$arr[3]) $str_diachi = $a4['tendiachi'] . ' - ' . $str_diachi; //$cap4 = $a4['tendiachi'];
								if(isset($a4['level5']) && $arr[4]){
									foreach ($a4['level5'] as $a5) {
										if($a5['_id']==$arr[4]) $str_diachi = $a5['tendiachi'] . ' - ' . $str_diachi; //$cap5 = $a5['tendiachi'];
									}
								}
							}
						}
					}
				}
			}	
		}
		if(isset($arr[5]) && $arr[5]) $str_diachi = $arr[5] . ' - ' . $str_diachi;
		return $str_diachi;
		//return $arr[5] . ' - ' . $cap5 . ' - ' . $cap4 . ' - ' . $cap3 . ' - ' . $cap2 . ' - ' . $cap1;
	}

	public function get_id1($tendiachi1){
		if($tendiachi1 && trim($tendiachi1) != ''){
			$query = array('tendiachi' => new MongoRegex('/' .$tendiachi1 . '/i'));
			$result = $this->_collection->findOne($query);
			if($result['_id']) return $result['_id']; else return '';
		} else {
			return '';
		}
	}

	public function get_id2($tendiachi1, $tendiachi2){
		if($tendiachi1 && $tendiachi2 && trim($tendiachi2) != ''){
			$query = array('tendiachi' => new MongoRegex('/' .$tendiachi1 . '/i'));
			$result = $this->_collection->findOne($query);
			if(isset($result['level2'])){
				foreach ($result['level2'] as $a2) {
					if($a2['tendiachi'] == trim($tendiachi2)) return $a2['_id'];
				}
			}
			return '';
		} else {
			return '';
		}
	}

	public function get_id3($tendiachi1, $tendiachi2, $tendiachi3){
		if($tendiachi1 && $tendiachi2 && $tendiachi3 && trim($tendiachi3) !=''){
			$query = array('tendiachi' => new MongoRegex('/' .$tendiachi1 . '/i'));
			$result = $this->_collection->findOne($query);
			if(isset($result['level2'])){
				foreach ($result['level2'] as $a2) {
					if(isset($a2['level3']) && $a2['tendiachi'] == trim($tendiachi2)){
						foreach ($a2['level3'] as $a3) {
							if($a3['tendiachi'] == trim($tendiachi3)) return $a3['_id'];
						}
					}
				}
			}
			return '';
		} else {
			return '';
		}
	}

	public function get_id4($tendiachi1, $tendiachi2, $tendiachi3, $tendiachi4){
		if($tendiachi1 && $tendiachi2 && $tendiachi3 && $tendiachi4 && trim($tendiachi4) !=''){
			$query = array('tendiachi' => new MongoRegex('/' .$tendiachi1 . '/i'));
			$result = $this->_collection->findOne($query);
			if(isset($result['level2'])){
				foreach ($result['level2'] as $a2) {
					if(isset($a2['level3']) && $a2['tendiachi'] == trim($tendiachi2)){
						foreach ($a2['level3'] as $a3) {
							if($a3['level4'] && $a3['tendiachi'] == $tendiachi3){
								foreach ($a3['level4'] as $a4) {
									if($a4['tendiachi'] == $tendiachi4) return $a4['_id'];
								}
							}
						}
					}
				}
			}
			return '';
		} else {
			return '';
		}
	}

	public function get_id5($tendiachi1, $tendiachi2, $tendiachi3, $tendiachi4, $tendiachi5){
		if($tendiachi1 && $tendiachi2 && $tendiachi3 && $tendiachi4 && $tendiachi5 && trim($tendiachi5) !=''){
			$query = array('tendiachi' => new MongoRegex('/' .$tendiachi1 . '/i'));
			$result = $this->_collection->findOne($query);
			if(isset($result['level2'])){
				foreach ($result['level2'] as $a2) {
					if(isset($a2['level3']) && $tendiachi2 && $a2['tendiachi'] == trim($tendiachi2)){
						foreach ($a2['level3'] as $a3) {
							if($a3['level4'] && $tendiachi3 && $a3['tendiachi'] == trim($tendiachi3)){
								foreach ($a3['level4'] as $a4) {
									if(isset($a4['level5']) && $tendiachi4 && $a4['tendiachi'] == $tendiachi4){
										foreach ($a4['level5'] as $a5) {
											if($a5['tendiachi'] == trim($tendiachi5)) return $a5['_id'];
										}
									}
								}
							}
						}
					}
				}
			}
			return '';
		} else {
			return '';
		}
	}
}
?>