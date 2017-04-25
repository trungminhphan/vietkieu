<?php
class CongDan{
	const COLLECTION = 'congdan';
	private $_mongo;
	private $_collection;

	public $id = '';
	public $code = '';
	public $cmnd = '';
	public $passport = '';
	public $hoten = '';
	public $gioitinh = '';
	public $ngaysinh = '';
	public $id_quoctich = ''; //array quoc tich....
	public $noisinh = '';
	public $hokhauthuongtru = '';
	public $noicutruhiennay = ''; //aray 6 cấp
	public $id_nganhnghe = '';
	public $diachilamviec = ''; //array 6 cap
	public $quatrinhdaotao = '';
	public $id_tongiao = '';
	public $id_trinhdo = '';
	public $dienthoaiban = '';
	public $didong = '';
	public $email = '';
	public $fax = '';
	public $thongtinnguoilienhe = '';
	public $id_user = ''; //Can bo thuc hien nhap
	public $date_post = ''; //ngay nhap vao.

	/************************** hoctap, laodong, kethon, dicu, dinhcu,..****************/
	public $hoctap = array(); 	public $id_hoctap = '';
	public $laodong = array(); 	public $id_laodong = '';
	public $kethon = array(); 	public $id_kethon = '';
	public $dicu = array();		public $id_dicu = '';
	public $dinhcu = array();	public $id_dinhcu = '';
	public $trithuc = array(); 	public $id_trithuc = '';
	public $doanhnhan = array(); public $id_doanhnhan = '';
	public $giadinh = array(); public $id_giadinh = '';

	public function __construct(){
		$this->_mongo = DBConnect::init();
		$this->_collection = $this->_mongo->getCollection(CongDan::COLLECTION);
	}

	public function get_one(){
		return $this->_collection->findOne(array('_id'=> new MongoId($this->id)));
	}

	public function get_one_on_hoten(){
		$query = array('hoten' => trim($this->hoten));
		return $this->_collection->findOne($query);
	}

	public function get_one_to_hoten(){
		//$query = array('$and' => array(array('hoten'=> trim($this->hoten)), array('gioitinh' => $this->gioitinh), array('namsinh'=> $this->namsinh)));
		$query = array('hoten'=> $this->hoten, 'gioitinh' => $this->gioitinh, 'namsinh'=> $this->namsinh);
		$fields = array('_id' => true);
		return $this->_collection->findOne($query, $fields);
	}

	public function get_all_list_to_ten(){
		return $this->_collection->find(array('hoten'=> new MongoRegex('/' . $this->hoten .'/i')))->sort(array('_id'=> -1))->limit(3);
	}

	public function get_all_list(){
		return $this->_collection->find()->sort(array('_id'=> -1));
	}

	public function get_list_kethon($quoctich){
		$query = array('id_quoctich' => array('$ne' => new MongoId($quoctich)));
		$fields = array('_id'=>1, 'hoten' => 1);
		return $this->_collection->find($query, $fields);
	}

	public function get_list_to_position($position, $limit){
		return $this->_collection->find()->skip($position)->limit($limit)->sort(array('code'=>-1));
	}

	public function get_list_to_position_condition($condition, $position, $limit){
		return $this->_collection->find($condition)->skip($position)->limit($limit);//->sort(array('code'=>-1));
	}

	public function get_totalFilter($condition){
		return $this->_collection->find($condition)->sort(array('code'=>-1))->count();
	}

	public function get_all_list_limit($number){
		return $this->_collection->find()->sort(array('_id'=> -1))->limit($number);	
	}

	public function get_list_condition($condition){
		return $this->_collection->find($condition)->sort(array('_id'=> -1))->sort(array('hoten'=>1));		
	}

	public function get_list_fields($condition, $fields){
		return $this->_collection->find($condition, $fields);
	}

	public function get_list_condition_id($condition){
		$fields = array('_id' => true, 'hoten' => true);
		return $this->_collection->find($condition,$fields)->sort(array('hoten'=> 1));		
	}

	public function get_id_all_list(){
		$fields = array('_id' => true);
		return $this->_collection->find(array(), $fields);
	}

	public function count_all(){
		return $this->_collection->find()->count();
	}

	public function set_tinh_chuaxacdinh($id_congdan, $noisinh){
		$query = array('$set' => array('noisinh' => $noisinh));
		$condition = array('_id' => new MongoId($id_congdan));
		$this->_collection->update($condition, $query);
	}

	public function insert(){
		$query = array( '_id' => $this->id,
						'code' => $this->code,
						'cmnd' => $this->cmnd,
						'passport' => $this->passport,
						'hoten' => trim($this->hoten),
						'gioitinh' => $this->gioitinh,
						'ngaysinh' => $this->ngaysinh,
						'quoctich' => $this->quoctich,
						'noisinh' => $this->noisinh,
						'hokhauthuongtru' => $this->hokhauthuongtru,
						'noicutruhiennay' => $this->noicutruhiennay,
						'id_nganhnghe' => $this->id_nganhnghe ? new MongoId($this->id_nganhnghe) : '',
						'diachilamviec' => $this->diachilamviec,
						'quatrinhdaotao' => $this->quatrinhdaotao,
						'id_tongiao' => $this->id_tongiao ? new MongoId($this->id_tongiao) : '',
						'id_trinhdo' => $this->id_trinhdo ? new MongoId($this->id_trinhdo) : '',
						'dienthoaiban' => $this->dienthoaiban,
						'didong' => $this->didong,
						'fax' => $this->fax,
						'email' => $this->email,
						'thongtinnguoilienhe' => $this->thongtinnguoilienhe,
						'id_user' => new MongoId($this->id_user),
						'date_post' => new MongoDate());
		return $this->_collection->insert($query);
	}

	public function edit(){
		$query = array('$set'=> array('code' => $this->code,
						'cmnd' => $this->cmnd,
						'passport' => $this->passport,
						'hoten' => trim($this->hoten),
						'gioitinh' => $this->gioitinh,
						'ngaysinh' => $this->ngaysinh,
						'quoctich' => $this->quoctich,
						'noisinh' => $this->noisinh,
						'hokhauthuongtru' => $this->hokhauthuongtru,
						'noicutruhiennay' => $this->noicutruhiennay,
						'id_nganhnghe' => $this->id_nganhnghe ? new MongoId($this->id_nganhnghe) : '',
						'diachilamviec' => $this->diachilamviec,
						'quatrinhdaotao' => $this->quatrinhdaotao,
						'id_tongiao' => $this->id_tongiao ? new MongoId($this->id_tongiao) : '',
						'id_trinhdo' => $this->id_trinhdo ? new MongoId($this->id_trinhdo) : '',
						'dienthoaiban' => $this->dienthoaiban,
						'didong' => $this->didong,
						'fax' => $this->fax,
						'email' => $this->email,
						'thongtinnguoilienhe' => $this->thongtinnguoilienhe,
						'id_user' => new MongoId($this->id_user),
						'date_post' => new MongoDate()));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}
	
	public function update_set_hocttap(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'id_trinhdo' => $this->id_trinhdo ? new MongoId($this->id_trinhdo) : ''));
		$condition = array('hoten' => $this->hoten,	'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);
		return $this->_collection->update($condition, $query);
	}
	public function update_set_laodong(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'id_trinhdo' => $this->id_trinhdo ? new MongoId($this->id_trinhdo) : ''));
		$condition = array('hoten' => $this->hoten,	'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);

		return $this->_collection->update($condition, $query);
	}
	public function update_set_kethon(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'id_quoctich' => $this->id_quoctich ? new MongoId($this->id_quoctich) : '',
			'id_nganhnghe' => $this->id_nganhnghe ? new MongoId($this->id_nganhnghe) : '',
			'diachi' => $this->diachi));
		$condition = array('hoten' => $this->hoten,	'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);
		return $this->_collection->update($condition, $query);
	}
	public function update_set_dicu(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'id_quoctich' => $this->id_quoctich ? new MongoId($this->id_quoctich) : '',
			'id_tongiao' => $this->id_tongiao ? new MongoId($this->id_tongiao) : '',
			//'id_nganhnghe' => $this->id_nganhnghe ? new MongoId($this->id_nganhnghe) : '',
			'diachi' => $this->diachi));
		$condition = array('hoten' => $this->hoten,	'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);
		return $this->_collection->update($condition, $query);
	}
	public function update_set_dinhcu(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'id_quoctich' => $this->id_quoctich ? new MongoId($this->id_quoctich) : '',
			'id_tongiao' => $this->id_tongiao ? new MongoId($this->id_tongiao) : '',
			'diachi' => $this->diachi));
		$condition = array('hoten' => $this->hoten,	'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);
		return $this->_collection->update($condition, $query);
	}
	public function update_set(){
		$query = array('$set'=> array(
			'noisinh' => $this->noisinh,
			'quequan' => $this->quequan,
			'id_quoctich' => $this->id_quoctich ? new MongoId($this->id_quoctich) : '',
			'id_tongiao' => $this->id_tongiao ? new MongoId($this->id_tongiao) : '',
			'id_trinhdo' => $this->id_trinhdo ? new MongoId($this->id_trinhdo) : '',
			'id_nganhnghe' => $this->id_nganhnghe ? new MongoId($this->id_nganhnghe) : ''));
		$condition = array('hoten' => $this->hoten, 'gioitinh' => $this->gioitinh,'namsinh' => $this->namsinh);
		return $this->_collection->update($condition, $query);
	}
	public function delete(){
		return $this->_collection->remove(array('_id' => new MongoId($this->id)));
	}
	public function check_exists(){
		//$query = array('$and' => array(array('cmnd' => $this->cmnd), array('passport' => $this->passport)));
		//$query = array('$and' => array(array('hoten'=> trim($this->hoten)), array('namsinh' => $this->namsinh), array('gioitinh' => $this->gioitinh)));
		$query = array('hoten' => $this->hoten, 'gioitinh' => $this->gioitinh, 'namsinh' => $this->namsinh);
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_exists_tongiao(){
		$query = array('_id' => new MongoId($this->id), 'id_tongiao' => new MongoId($this->id_tongiao));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		return false;
	}

	public function check_exists_kethon(){
		$query = array('$and' => array(array('hoten'=> $this->hoten), array('namsinh' => $this->namsinh), array('gioitinh' => $this->gioitinh), array('noisinh' => $this->noisinh), array('id_quoctich' => new MongoId($this->id_quoctich)), array('diachi' => $this->diachi)));
		//$query = array('hoten'=> $this->hoten, 'namsinh' => $this->namsinh, 'gioitinh' => $this->gioitinh, 'noisinh' => $this->noisinh, 'id_quoctich' => new MongoId($this->id_quoctich), 'diachi' => $this->diachi);
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}


	public function get_one_to_hoten_kethon(){
		//$query = array('$and' => array(array('hoten'=> trim($this->hoten)), array('gioitinh' => $this->gioitinh), array('namsinh'=> $this->namsinh)));
		$query = array('$and' => array(array('hoten'=> $this->hoten), array('namsinh' => $this->namsinh), array('gioitinh' => $this->gioitinh), array('noisinh' => $this->noisinh), array('id_quoctich' => new MongoId($this->id_quoctich)), array('diachi' => $this->diachi)));
		$fields = array('_id' => true);
		return $this->_collection->findOne($query, $fields);
	}

	public function check_exist_dicu(){
		$query = array('$and' => array(array('hoten'=> $this->hoten), array('namsinh' => $this->namsinh), array('gioitinh' => $this->gioitinh), array('noisinh' => $this->noisinh), array('id_quoctich' => new MongoId($this->id_quoctich)), array('id_tongiao' => new MongoId($this->id_tongiao)), array('diachi' => $this->diachi)));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function get_one_to_hoten_dicu(){
		$query = array('$and' => array(array('hoten'=> $this->hoten), array('namsinh' => $this->namsinh), array('gioitinh' => $this->gioitinh), array('noisinh' => $this->noisinh), array('id_quoctich' => new MongoId($this->id_quoctich)), array('id_tongiao' => new MongoId($this->id_tongiao)), array('diachi' => $this->diachi)));
		$fields = array('_id' => true);
		return $this->_collection->findOne($query, $fields);
	}

	public function check_quocgia(){
		$query = array('id_quoctich' => new MongoId($this->id_quoctich));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
	public function check_tongiao(){
		$query = array('id_tongiao' => new MongoId($this->id_tongiao));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
	public function check_trinhdo(){
		$query = array('id_trinhdo' => new MongoId($this->id_trinhdo));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
	public function check_nganhnghe(){
		$query = array('id_nganhnghe' => new MongoId($this->id_nganhnghe));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function convert_nganhnghe($_id, $id_dest){
		$query = array('$set' => array('id_nganhnghe' => new MongoId($id_dest)));
		$condition = array('_id' => new MongoId($_id));
		return $this->_collection->update($condition, $query);
	}

	public function convert_trinhdo($_id, $id_dest){
		$query = array('$set' => array('id_trinhdo' => new MongoId($id_dest)));
		$condition = array('_id' => new MongoId($_id));
		return $this->_collection->update($condition, $query);
	}

	public function convert_quoctich($_id, $id_dest){
		$query = array('$set' => array('id_quoctich' => new MongoId($id_dest)));
		$condition = array('_id' => new MongoId($_id));
		return $this->_collection->update($condition, $query);
	}
	public function convert_tongiao($_id, $id_dest){
		$query = array('$set' => array('id_tongiao' => new MongoId($id_dest)));
		$condition = array('_id' => new MongoId($_id));
		return $this->_collection->update($condition, $query);
	}

	/*************************** BAT DAU VIET MOI ***************************/

	public function push_hoctap(){
		$query = array('$push' => array('hoctap' => $this->hoctap));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_hoctap(){
		$query = array('$pull' => $this->hoctap);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_hoctap(){
		$query = array('$set' => $this->hoctap);
		$condition = array('_id' => new MongoId($this->id), 'hoctap.id_hoctap' => new MongoId($this->id_hoctap));
		return $this->_collection->update($condition, $query);
	}

	public function push_laodong(){
		$query = array('$push' => array('laodong' => $this->laodong));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_laodong(){
		$query = array('$pull' => $this->laodong);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_laodong(){
		$query = array('$set' => $this->laodong);
		$condition = array('_id' => new MongoId($this->id), 'laodong.id_laodong' => new MongoId($this->id_laodong));
		return $this->_collection->update($condition, $query);
	}

	public function push_kethon(){
		$query = array('$push' => array('kethon' => $this->kethon));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_kethon(){
		$query = array('$pull' => $this->kethon);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_kethon(){
		$query = array('$set' => $this->kethon);
		$condition = array('_id' => new MongoId($this->id), 'kethon.id_kethon' => new MongoId($this->id_kethon));
		return $this->_collection->update($condition, $query);
	}

	public function push_dicu(){
		$query = array('$push' => array('dicu' => $this->dicu));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_dicu(){
		$query = array('$pull' => $this->dicu);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_dicu(){
		$query = array('$set' => $this->dicu);
		$condition = array('_id' => new MongoId($this->id), 'dicu.id_dicu' => new MongoId($this->id_dicu));
		return $this->_collection->update($condition, $query);
	}

	public function push_dinhcu(){
		$query = array('$push' => array('dinhcu' => $this->dinhcu));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_dinhcu(){
		$query = array('$pull' => $this->dinhcu);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_dinhcu(){
		$query = array('$set' => $this->dinhcu);
		$condition = array('_id' => new MongoId($this->id), 'dinhcu.id_dinhcu' => new MongoId($this->id_dinhcu));
		return $this->_collection->update($condition, $query);
	}

	public function push_trithuc(){
		$query = array('$push' => array('trithuc' => $this->trithuc));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_trithuc(){
		$query = array('$pull' => $this->trithuc);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_trithuc(){
		$query = array('$set' => $this->trithuc);
		$condition = array('_id' => new MongoId($this->id), 'trithuc.id_trithuc' => new MongoId($this->id_trithuc));
		return $this->_collection->update($condition, $query);
	}

	public function push_doanhnhan(){
		$query = array('$push' => array('doanhnhan' => $this->doanhnhan));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_doanhnhan(){
		$query = array('$pull' => $this->doanhnhan);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_doanhnhan(){
		$query = array('$set' => $this->doanhnhan);
		$condition = array('_id' => new MongoId($this->id), 'doanhnhan.id_doanhnhan' => new MongoId($this->id_doanhnhan));
		return $this->_collection->update($condition, $query);
	}

	public function push_giadinh(){
		$query = array('$push' => array('giadinh' => $this->giadinh));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function pull_giadinh(){
		$query = array('$pull' => $this->giadinh);
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);
	}

	public function set_giadinh(){
		$query = array('$set' => $this->giadinh);
		$condition = array('_id' => new MongoId($this->id), 'giadinh.id_giadinh' => new MongoId($this->id_giadinh));
		return $this->_collection->update($condition, $query);
	}

	public function get_maxCode(){
		$query = array('$group' => array( '_id' => '', 'maxCode' => array('$max' => '$code')));
		$result = $this->_collection->aggregate($query);
		if(isset($result['result'][0]['maxCode']) && $result['result'][0]['maxCode']) return $result['result'][0]['maxCode'] + 1;
		else return 1;
		//var_dump($result);
	}

	public function check_exist_code($code){
		$query = array('_id' => true);
		$condition = array('code' => $code);
		$result = $this->_collection->findOne($condition, $query);
		if($result['_id']) return true;
		return false;
	}

	public function get_id_by_code($code){
		$query = array('_id' => true);
		$condition = array('code' => $code);
		$result = $this->_collection->findOne($condition, $query);
		if($result['_id']) return $result['_id']; else return '';
	}

	public function get_list_to_diachi($arr_diachi, $act, $loaithongke){
		$arr = array();
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				if($value){
					array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
				}
			}
		}
		if($act == 'kethon'){
			array_push($arr, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
			array_push($arr, array('laodong.id_laodong' => array('$exists' => false)));
		}
		array_push($arr, array($act . '.id_' . $act => array('$exists' => true)));
		if($act=='laodong'){
			array_push($arr, array('hoctap.id_hoctap' => array('$exists' => false)));
		}
		if($act=='dicu'){
			array_push($arr, array('hoctap.id_hoctap' => array('$exists' => false)));
			array_push($arr, array('laodong.id_laodong' => array('$exists' => false)));
			array_push($arr, array('kethon.id_kethon' => array('$exists' => false)));
			//array_push($arr, array('$or' => array(array('hoctap.id_hoctap' => array('$exists' => false)), array('laodong.id_laodong' => array('$exists' => false)), array('kethon.id_kethon' => array('$exists' => false)))));			
		}
		$query = array('$and' => $arr);
		return $this->_collection->find($query);
	}
	public function get_list_to_diachi_vietkieu($arr_diachi, $loaithongke){
		//$quocgia = new QuocGia(); $arr_quoctich = array();
		$arr = array();
		/*$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
		if($quocgia_list){
			foreach ($quocgia_list as $qg) {
				array_push($arr_quoctich, $qg['_id']);
			}
		}*/
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				//array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
				if($value){
					if($key > 1){
						array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
					} else {
						array_push($arr, array('$or' => array(array('hokhauthuongtru.'.$key => new MongoId($value)), array('noisinh.'.$key => new MongoId($value)))));
					}
				}
			}
		}
		//array_push($arr, array('quoctich' => array('$in' => $arr_quoctich)));
		array_push($arr, array('noicutruhiennay.0' => array('$ne' => new MongoId('5576ece4d89398ec07000029'))));
		array_push($arr, array('noicutruhiennay.0' => array('$exists' => true)));
		array_push($arr, array('kethon.id_kethon' => array('$exists' => false)));
		$query = array('$and' => $arr);
		return $this->_collection->find($query);
	}
	public function get_list_to_diachi_real($arr_diachi, $loaithongke){
		$arr_loaithongke = array('hoctap', 'laodong', 'kethon', 'dicu', 'dinhcu');
		$arr = array();$arr_ltk = array();
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				if($value){
					array_push($arr, array($loaithongke. '.'.$key => new MongoId($value)));
				}
			}
		}
		foreach($arr_loaithongke as $k => $v){
			array_push($arr_ltk, array($v . '.id_' . $v => array('$exists' => true)));
		}
		array_push($arr, array('$or' => $arr_ltk));
		$query = array('$and' => $arr);
		return $this->_collection->find($query);
	}
	public function count_to_diachi($arr_diachi, $act, $loaithongke){
		$arr = array();
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				if($value){
					array_push($arr, array($loaithongke. '.'.$key => new MongoId($value)));
				}
			}
		}
		if($act == 'kethon'){
			array_push($arr, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
			array_push($arr, array('laodong.id_laodong' => array('$exists' => false)));
		}

		array_push($arr, array($act . '.id_' . $act => array('$exists' => true)));
		if($act == 'laodong'){
			array_push($arr, array('hoctap.id_hoctap' => array('$exists' => false)));
		}
		if($act=='dicu'){
			array_push($arr, array('hoctap.id_hoctap' => array('$exists' => false)));
			array_push($arr, array('laodong.id_laodong' => array('$exists' => false)));
			array_push($arr, array('kethon.id_kethon' => array('$exists' => false)));
			//array_push($arr, array('$or' => array(array('hoctap.id_hoctap' => array('$exists' => false)), array('laodong.id_laodong' => array('$exists' => false)), array('kethon.id_kethon' => array('$exists' => false)))));			
		}
		
		$query = array('$and' => $arr);
		return $this->_collection->find($query)->count();
	}
	public function count_to_diachi_vietkieu($arr_diachi, $loaithongke){
		//$quocgia = new QuocGia(); $arr_quoctich = array(); 
		$arr = array();
		//$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
		//if($quocgia_list){
		//	foreach ($quocgia_list as $qg) {
		//		array_push($arr_quoctich, $qg['_id']);
		//	}
		//}
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				//array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
				if($value){
					if($key > 1){
						array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
					} else {
						//array_push($arr, array($loaithongke.'.'.$key => new MongoId($value)));
						array_push($arr, array('$or' => array(array('hokhauthuongtru.'.$key => new MongoId($value)), array('noisinh.'.$key => new MongoId($value)))));
					}
				}
			}
		}
		//array_push($arr, array('quoctich' => array('$in' => $arr_quoctich)));
		array_push($arr, array('noicutruhiennay.0' => array('$ne' => new MongoId('5576ece4d89398ec07000029'))));
		array_push($arr, array('noicutruhiennay.0' => array('$exists' => true)));
		array_push($arr, array('kethon.id_kethon' => array('$exists' => false)));
		$query = array('$and' => $arr);
		return $this->_collection->find($query)->count();
	}
	public function count_to_diachi_real($arr_diachi, $loaithongke){
		$arr_loaithongke = array('hoctap', 'laodong', 'kethon', 'dicu', 'dinhcu');
		$arr = array();$arr_ltk = array();
		if($arr_diachi){
			foreach ($arr_diachi as $key => $value) {
				if($value){
					array_push($arr, array($loaithongke. '.'.$key => new MongoId($value)));
				}
			}
		}
		foreach($arr_loaithongke as $k => $v){
			array_push($arr_ltk, array($v . '.id_' . $v => array('$exists' => true)));
		}
		array_push($arr, array('$or' => $arr_ltk));
		$query = array('$and' => $arr);
		return $this->_collection->find($query)->count();
	}

	public function count_hoctap_to_coquancongtac($id_coquancongtac){
		$query = array('hoctap.id_coquancongtac' => new MongoId($id_coquancongtac));
		return $this->_collection->find($query)->count();
	}
	public function count_hoctap_to_nganhhoc($id_nganhhoc){
		$query = array('hoctap.id_nganhhoc' => new MongoId($id_nganhhoc));
		return $this->_collection->find($query)->count();
	}
	public function count_hoctap_to_quocgiaduhoc($id_quocgia){
		$query = array('hoctap.id_quocgia' => new MongoId($id_quocgia));
		return $this->_collection->find($query)->count();
	}
	public function count_hoctap_to_hinhthuchoctap($id_hinhthuchoctap){
		$query = array('hoctap.id_hinhthuchoctap' => new MongoId($id_hinhthuchoctap));
		return $this->_collection->find($query)->count();
	}
	public function count_hoctap_to_bangcapseco($id_trinhdo){
		$query = array('hoctap.id_trinhdo' => new MongoId($id_trinhdo));
		return $this->_collection->find($query)->count();
	}

	public function count_laodong_to_quocgia($id_quocgia){
		$query = array('laodong.id_quocgia' => new MongoId($id_quocgia));
		return $this->_collection->find($query)->count();
	}

	public function count_laodong_to_nganhnghe($id_nganhnghe){
		$query = array('laodong.id_nganhnghe' => new MongoId($id_nganhnghe));
		return $this->_collection->find($query)->count();
	}

	public function count_laodong_to_trinhdo($id_trinhdo){
		$query = array('$and' => array(array('id_trinhdo' => new MongoId($id_trinhdo)), array('laodong.id_laodong' =>array('$exists' => true))));
		return $this->_collection->find($query)->count();
	}

	public function count_laodong_to_tinhtranglaodong($id_tinhtranglaodong){
		$query = array('laodong.id_tinhtranglaodong' => new MongoId($id_tinhtranglaodong));
		return $this->_collection->find($query)->count();
	}

	public function count_kethon_to_quocgia($id_quocgia){
		$query = array('$and' => array(array('quoctich' => new MongoId($id_quocgia)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => array('$ne' => new MongoId('543b14b65c1e8824048b456a')))));
		return $this->_collection->find($query)->count();
	}

	public function get_kethon_angiang($condition){
		return $this->_collection->find($condition);
	}

	public function count_kethon_to_nganhnghe($id_nganhnghe){
		//$query = array('$and' => array(array('id_nganhnghe' => new MongoId($id_nganhnghe)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => array('$ne' => new MongoId('543b14b65c1e8824048b456a')))));
		$query = array('$and' => array(array('id_nganhnghe' => new MongoId($id_nganhnghe)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => new MongoId('543b14b65c1e8824048b456a'))));
		return $this->_collection->find($query)->count();
	}
	public function count_kethon_to_gioitinh($gt){
		if($gt == 'Không xác định'){
			$query = array('$and' => array(array('gioitinh' => array('$nin' => array('Nam', 'Nữ'))), array('kethon.id_kethon' => array('$exists' => true)),array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029'))))));
		} else {
			$query = array('$and' => array(array('gioitinh' => $gt), array('kethon.id_kethon' => array('$exists' => true)),array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029'))))));
		}
		return $this->_collection->find($query)->count();	
	}
	public function count_vietkieu_quocgia($id_quocgia){
		$arr_query = array();$query='';
		//array_push($arr_query, array('quoctich' => new MongoId($id_quocgia)));
		array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
		array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
		array_push($arr_query, array('noicutruhiennay.0' => new MongoId($id_quocgia)));
		array_push($arr_query, array('noicutruhiennay.0' => array('$exists' => true)));
		array_push($arr_query, array('kethon.id_kethon' => array('$exists' => false)));
		if(count($arr_query) > 0 ) $query = array('$and' => $arr_query);
		return $this->_collection->find($query)->count();
	}

	public function count_dicu_to_quocgia($id_quocgia){
		$query = array('dicu.id_quocgia' => new MongoId($id_quocgia));
		return $this->_collection->find($query)->count();
	}

	public function count_dicu_to_tongiao($id_tongiao){
		$query = array('$and' => array(array('id_tongiao' => new MongoId($id_tongiao)), array('dicu.id_dicu' => array('$exists' => true))));
		return $this->_collection->find($query)->count();
	}

	public function count_vietkieu_to_tongiao($id_tongiao){
		//$quocgia=new QuocGia();$arr_quoctich = array();
		$arr_query = array();
		/*$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
		if($quocgia_list){
			foreach ($quocgia_list as $qg) {
				array_push($arr_quoctich, $qg['_id']);
			}
		}*/
		//array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
		array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
		array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
		array_push($arr_query, array('noicutruhiennay.0' => array('$ne' => new MongoId('5576ece4d89398ec07000029'))));
		array_push($arr_query, array('noicutruhiennay.0' => array('$exists' => true)));
		array_push($arr_query, array('kethon.id_kethon' => array('$exists' => false)));
		if($id_tongiao){
			array_push($arr_query, array('id_tongiao' => new MongoId($id_tongiao)));
		} else {
			array_push($arr_query, array('id_tongiao' => ''));
		}
		$query = array('$and' => $arr_query);
		return $this->_collection->find($query)->count();
	}

	public function count_dicu_to_diendicu($id_diendicu){
		$query = array('dicu.id_diendicu' => new MongoId($id_diendicu));
		return $this->_collection->find($query)->count();
	}

	public function count_vietkieu_to_diendicu($id_diendicu){
		//$quocgia=new QuocGia();$arr_quoctich = array();
		$arr_query = array();
		/*$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
		if($quocgia_list){
			foreach ($quocgia_list as $qg) {
				array_push($arr_quoctich, $qg['_id']);
			}
		}*/
		//array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
		array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
		array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
		array_push($arr_query, array('noicutruhiennay.0' => array('$ne' => new MongoId('5576ece4d89398ec07000029'))));
		array_push($arr_query, array('noicutruhiennay.0' => array('$exists' => true)));
		array_push($arr_query, array('kethon.id_kethon' => array('$exists' => false)));
		if($id_diendicu){
			array_push($arr_query, array('dicu.id_diendicu' => new MongoId($id_diendicu)));
		} else {
			array_push($arr_query, array('$or' => array(array('dicu.id_diendicu' => ''), array('dicu.id_diendicu'=>array('$exists' => false)))));
		}
		$query = array('$and' => $arr_query);
		return $this->_collection->find($query)->count();
	}

	public function count_dicu_to_namdicu($namdicu){
		$date1 = new MongoDate(strtotime($namdicu . '-01-01 00:00:00'));
		$date2 = new MongoDate(strtotime($namdicu . '-12-31 23:00:00'));
		$query = array('$and' => array(array('dicu.ngaydicu' => array('$gte' => $date1)), array('dicu.ngaydicu' => array('$lte' => $date2))));
		return $this->_collection->find($query)->count();
	}

	public function count_dinhcu_to_quocgia($id_quocgia){
		$query = array('dinhcu.id_quocgia' => new MongoId($id_quocgia));
		return $this->_collection->find($query)->count();
	}

	public function count_dinhcu_to_namnhaptich($namnhaptich){
		$date1 = new MongoDate(strtotime($namnhaptich . '-01-01 00:00:00'));
		$date2 = new MongoDate(strtotime($namnhaptich . '-12-31 23:00:00'));
		$query = array('$and' => array(array('dinhcu.ngaynhaptich' => array('$gte' => $date1)), array('dinhcu.ngaynhaptich' => array('$lte' => $date2))));
		return $this->_collection->find($query)->count();
	}
	/*************************************** check delete cac danh muc ****************************/

	public function check_dm_hinhthuchoctap($id){
		$query = array('hoctap.id_hinhthuchoctap' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}
	public function check_dm_coquancongtac($id){
		$query = array('hoctap.id_coquancongtac' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_quocgia($id){
		$query = array('$or' => array(
						array('quoctich' => new MongoId($id)),
						array('hoctap.id_quocgia' => new MongoId($id)),
						array('laodong.id_quocgia' => new MongoId($id)),
						array('dicu.id_quocgia' => new MongoId($id)),
						array('dinhcu.id_quocgia' => new MongoId($id))
					));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_tongiao($id){
		$query = array('id_tongiao' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_trinhdo($id){
		$query = array('$or' => array(
						array('id_trinhdo' => new MongoId($id)),
						array('hoctap.id_trinhdo' => new MongoId($id))
					));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_nganhnghe($id){
		$query = array('$or' => array(
						array('id_nganhnghe' => new MongoId($id)),
						array('laodong.id_nganhnghe' => new MongoId($id))
					));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_nganhhoc($id){
		$query = array('hoctap.id_nganhhoc' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_diendicu($id){
		$query = array('dicu.id_diendicu' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_tinhtranglaodong($id){
		$query = array('laodong.id_tinhtranglaodong' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_doanhnghiep($id){
		$query = array('doanhnhan.id_doanhnghiep' => new MongoId($id));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function check_dm_diachi($id, $level){
		$query = array('$or' => array(
						array('noisinh.'.$level => new MongoId($id)),
						array('noicutruhienay.'.$level => new MongoId($id)),
						array('diachilamviec.'.$level => new MongoId($id)),
					));
		$fields = array('_id' => true);
		$result = $this->_collection->findOne($query, $fields);
		if($result['_id']) return true;
		else return false;
	}

	public function set_ngaysinh(){
		$query =  array('$set'=> array('ngaysinh' => $this->ngaysinh));
		$condition = array('_id' => new MongoId($this->id));
		return $this->_collection->update($condition, $query);		
	}

	public function count_record_to_users($id_user){
		$count = 0;
		$query = array('$or' => array(
			array('hoctap.id_user' => new MongoId($id_user)),
			array('laodong.id_user' => new MongoId($id_user)),
			array('kethon.id_user' => new MongoId($id_user)),
			array('dicu.id_user' => new MongoId($id_user)),
			array('vietkieu.id_user' => new MongoId($id_user)),
			array('trithuc.id_user' => new MongoId($id_user)),
			array('doanhnhan.id_user' => new MongoId($id_user))
			));
		$result = $this->_collection->find($query);
		if($result){
			foreach ($result as $key => $value) {
				if($value['id_user'] == $id_user) $count++;
				/*if(isset($value['hoctap']) && $value['hoctap']){
					foreach ($value['hoctap'] as $v) {
						if($id_user == $v['id_user']) $count++;

					}
				}
				if(isset($value['laodong']) && $value['laodong']){
					foreach ($value['laodong'] as $v) {
						if($id_user == $v['id_user']) $count++;
					}
				}

				if(isset($value['kethon']) && $value['kethon']){
					foreach ($value['kethon'] as $v) {
						if($id_user == $v['id_user']) $count++;
					}
				}

				if(isset($value['vietkieu']) && $value['vietkieu']){
					foreach ($value['vietkieu'] as $v) {
						if($id_user == $v['id_user']) $count++;
					}
				}

				if(isset($value['trithuc']) && $value['trithuc']){
					foreach ($value['trithuc'] as $v) {
						if($id_user == $v['id_user']) $count++;
					}
				}

				if(isset($value['doanhnhan']) && $value['doanhnhan']){
					foreach ($value['doanhnhan'] as $v) {
						if($id_user == $v['id_user']) $count++;
					}
				}*/
			}
		}
		return $count;
	}
}
?>