<?php
class DoanhNghiep{
	const COLLECTION = 'doanhnghiep';
	public $id = '';
	public $ten = '';
	public $diachi = '';
	public $sodkkd = '';
	public $vondkkd = ''; //Tỷ VNĐ
	public $ngaydkkd = '';
	public $hinhthucdautu = '';
	public $tinhtranghoatdong = '';
	public $linhvuckinhdoanh = '';
	public $ghichu = '';
	public $logo = '';

	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(DoanhNghiep::COLLECTION);
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

	public function insert(){
		$query = array('ten' => $this->ten, 
						'diachi' => $this->diachi, 
						'sodkkd' => $this->sodkkd,
						'vondkkd' => $this->vondkkd, 
						'ngaydkkd' => $this->ngaydkkd, 
						'hinhthucdautu' => $this->hinhthucdautu,
						'tinhtranghoatdong' => $this->tinhtranghoatdong,
						'linhvuckinhdoanh' => $this->linhvuckinhdoanh,
						'ghichu' => $this->ghichu,
						'logo' => $this->logo,
						'date_post' => new MongoDate());
		return $this->_collection->insert($query);
	}

	public function edit(){
		$query = array('$set'=> array('ten' => $this->ten, 
						'diachi' => $this->diachi, 
						'sodkkd' => $this->sodkkd,
						'vondkkd' => $this->vondkkd, 
						'ngaydkkd' => $this->ngaydkkd, 
						'hinhthucdautu' => $this->hinhthucdautu,
						'tinhtranghoatdong' => $this->tinhtranghoatdong,
						'linhvuckinhdoanh' => $this->linhvuckinhdoanh,
						'ghichu' => $this->ghichu,
						'logo' => $this->logo));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function delete(){
		return $this->_collection->remove(array('_id'=> new MongoId($this->id)));
	}

	public function get_id($ten){
		$query = array('_id' => true);
		$condition = array('ten' => new MongoRegex('/' . $ten . '/i'));
		$result = $this->_collection->findOne($condition, $query);
		if($result['_id']) return $result['_id']; else return '';
	}
}