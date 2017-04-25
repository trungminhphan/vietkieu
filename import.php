<?php
require_once('header.php');
require_once('cls/PHPExcel/IOFactory.php');
$filename = isset($_GET['filename']) ? $_GET['filename'] : '';
if(isset($_POST['submit'])){
	$target_dir = "uploads/";
	$file_name = date("Ymdhsi") .'_'. basename($_FILES["filename"]["name"]);
	$target_file = $target_dir . $file_name;
	$FileType = pathinfo($target_file, PATHINFO_EXTENSION);
	
	if($FileType != "xlsx" ) {
	    $msg = 'Tập tin không đúng [xlsx], vui lòng download file mẫu';
	} else {
		if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
	        $msg = 'Upload tập tin thành công.';
	    } else {
	        $msg = 'Không thể Upload tập tin được';
	    }
	}
	if(file_exists('uploads/' . $file_name)){
		transfers_to('import.php?filename=' . $file_name);
	} else {
		transfers_to('import.php');
	}
}
?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Import dữ liệu từ Excel</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="hoctapform" enctype="multipart/form-data">
	<div class="grid">
		<div class="row cells12">
			<div class="cell colspan2 padding-top-10">Chọn tập tin</div>
			<div class="cell colspan4 input-control file" data-role="input">
				<input type="file" name="filename" id="filename" />
        		<button class="button"><span class="mif-folder"></span></button>
			</div>
			<div class="cell">
				<input type="submit" name="submit" value="Ok" class="button primary" />
			</div>
			<div class="cell colspan2 align-left">
				<a href="templates/import.xlsx" class="button"><span class="mif-file-download"> File mẫu</span></a>
			</div>
		</div>
	</div>
</form>

<?php if($filename): ?>
<table class="table striped hovered border bordered">
<thead>
<tr>
	<th rowspan="3">ID</th>
	<th rowspan="3">CMND</th>
	<th rowspan="3">Passport</th>
	<th rowspan="3">Họ tên</th>
	<th rowspan="3">Ngày sinh</th>
	<th rowspan="3">Giới tính</th>
	<th rowspan="3">Quốc tịch</th>
	<th colspan="5">Nơi sinh</th>
	<th colspan="5">Nơi cư trú hiện nay</th>
	<th rowspan="3">Nghề nghiệp</th>
	<th colspan="5">Địa chỉ làm việc</th>
	<th rowspan="3">Quá trình đào tạo</th>
	<th rowspan="3">Tôn giáo</th>
	<th rowspan="3">Trình độ học vấn</th>
	<th rowspan="3">Điện thoại</th>
	<th rowspan="3">Mobile</th>
	<th rowspan="3">Fax</th>
	<th rowspan="3">Email</th>
	<th rowspan="3">Thông tin liên hệ</th>
	<th colspan="7">HỌC TẬP</th>
	<th colspan="7">LAO ĐỘNG</th>
	<th colspan="32">KẾT HÔN</th>
	<th colspan="3">DI CƯ</th>
	<th colspan="2">ĐỊNH CƯ</th>
	<th colspan="4">TRÍ THỨC</th>
	<th colspan="6">DOANH NHÂN</th>
	<th colspan="3">QUAN HỆ GIA ĐÌNH</th>
</tr>
<tr>
	<th rowspan="2">Ấp/Khóm</th>
	<th rowspan="2">Xã/Phường/TT</th>
	<th rowspan="2">Huyện/TX/TP</th>
	<th rowspan="2">Tỉnh</th>
	<th rowspan="2">Quốc Gia</th>
	<th rowspan="2">Ấp/Khóm</th>
	<th rowspan="2">Xã/Phường/TT</th>
	<th rowspan="2">Huyện/TX/TP</th>
	<th rowspan="2">Tỉnh</th>
	<th rowspan="2">Quốc Gia</th>
	<th rowspan="2">Ấp/Khóm</th>
	<th rowspan="2">Xã/Phường/TT</th>
	<th rowspan="2">Huyện/TX/TP</th>
	<th rowspan="2">Tỉnh</th>
	<th rowspan="2">Quốc Gia</th>
	<!---------- HOC TAP -------------- -->
	<th rowspan="2">Quốc gia du học</th>
	<th rowspan="2">Thời gian bắt đầu</th>
	<th rowspan="2">Thời gian kết thúc</th>
	<th rowspan="2">Chuyên ngành</th>
	<th rowspan="2">Hình thúc du học</th>
	<th rowspan="2">Bằng cấp khi tốt nghiệp</th>
	<th rowspan="2">Đơn vị công tác</th>
	<!-- LAO DONG-------------- -->
	<th rowspan="2">Quốc gia lao động</th>
	<th rowspan="2">Thời gian bắt đầu</th>
	<th rowspan="2">Thời gian kết thúc</th>
	<th rowspan="2">Ngành nghề</th>
	<th rowspan="2">Tình trạng lao động</th>
	<th rowspan="2">Cơ quan lao động</th>
	<th rowspan="2">Địa chỉ</th>
	<!-- KETHON - -->
	<th rowspan="2">ID</th>
	<th rowspan="2">CMND</th>
	<th rowspan="2">Passport</th>
	<th rowspan="2">Họ tên</th>
	<th rowspan="2">Ngày sinh</th>
	<th rowspan="2">Giới tính</th>
	<th rowspan="2">Quốc tịch</th>
	<th colspan="5">Nơi sinh</th>
	<th colspan="5">Nơi cư trú hiện nay</th>
	<th rowspan="2">Nghề nghiệp</th>
	<th colspan="5">Địa chỉ làm việc</th>
	<th rowspan="2">Quá trình đào tạo</th>
	<th rowspan="2">Tôn giáo</th>
	<th rowspan="2">Trình độ học vấn</th>
	<th rowspan="2">Điện thoại</th>
	<th rowspan="2">Mobile</th>
	<th rowspan="2">Fax</th>
	<th rowspan="2">Email</th>
	<th rowspan="2">Thông tin liên hệ</th>
	<th rowspan="2">Ngày kết hôn</th>
	<!--- DI CU ------ -->
	<th rowspan="2">Quốc gia di cư</th>
	<th rowspan="2">Ngày di cư</th>
	<th rowspan="2">Diện di cư</th>
	<!--- ĐỊNH CU ------ -->
	<th rowspan="2">Quốc gia định cư</th>
	<th rowspan="2">Ngày nhập tịch</th>
	<!--- TRI THUC ------ -->
	<th rowspan="2">Lĩnh vực</th>
	<th rowspan="2">Thời gian bắt đầu</th>
	<th rowspan="2">Thời gian kết thúc</th>
	<th rowspan="2">Nội dung</th>
	<!--- DOANH NHAN ------ -->
	<th rowspan="2">Doanh nghiệp</th>
	<th rowspan="2">Chức vụ</th>
	<th rowspan="2">Đơn vị tiền</th>
	<th rowspan="2">Số tiền</th>
	<th rowspan="2">Tỷ giá</th>
	<th rowspan="2">VNĐ</th>
	<!--- GIA ĐINH ---- -->
	<th rowspan="2">ID</th>
	<th rowspan="2">Quan hệ 1</th>
	<th rowspan="2">Quan hệ 2</th>
</tr>
<tr>
	<th>Ấp/Khóm</th>
	<th>Xã/Phường/TT</th>
	<th>Huyện/TX/TP</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Ấp/Khóm</th>
	<th>Xã/Phường/TT</th>
	<th>Huyện/TX/TP</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Ấp/Khóm</th>
	<th>Xã/Phường/TT</th>
	<th>Huyện/TX/TP</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
</tr>
</thead>
<tbody>
	<?php
	$objPHPExcel = PHPExcel_IOFactory::load('uploads/' . $filename);
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$id_user = $users->get_userid();
	$congdan = new CongDan();$quocgia = new QuocGia();$diachi = new DiaChi();
	$nganhnghe = new NganhNghe();$tongiao = new TonGiao();$trinhdo = new TrinhDo();
	$nganhhoc = new NganhHoc();$coquancongtac = new CoQuanCongTac();$hinhthuchoctap = new HinhThucHocTap();
	$tinhtranglaodong = new TinhTrangLaoDong();$diendicu = new DienDiDinhCu();$doangnghiep = new DoanhNghiep();
	if($sheetData){
		foreach($sheetData as $key => $value){
			if($key >= 4 && $value['A']){
				if($congdan->check_exist_code($value['A'])) {
					$classes = 'class="bg-red fg-white"';
				} else {
					$classes = '';
					//Thong tin chung
					$id = new MongoId();
					$id_quoctich = $quocgia->get_id($value['G']);
					$noisinh1 = $diachi->get_id1($value['M']);
					$noisinh2 = $diachi->get_id2($value['M'], $value['L']);
					$noisinh3 = $diachi->get_id3($value['M'], $value['L'], $value['K']);
					$noisinh4 = $diachi->get_id4($value['M'], $value['L'], $value['K'], $value['J']);
					$noisinh5 = $diachi->get_id5($value['M'], $value['L'], $value['K'], $value['J'], $value['I']);
					$noisinh6 = $value['H'];
					$noisinh = array($noisinh1, $noisinh2, $noisinh3, $noisinh4, $noisinh5, $noisinh6);

					$hokhauthuongtru1 = $diachi->get_id1($value['S']);
					$hokhauthuongtru2 = $diachi->get_id2($value['S'], $value['R']);
					$hokhauthuongtru3 = $diachi->get_id3($value['S'], $value['R'], $value['Q']);
					$hokhauthuongtru4 = $diachi->get_id4($value['S'], $value['R'], $value['Q'], $value['P']);
					$hokhauthuongtru5 = $diachi->get_id5($value['S'], $value['R'], $value['Q'], $value['P'],$value['O']);
					$hokhauthuongtru6 = $value['N'];
					$hokhauthuongtru = array($hokhauthuongtru1, $hokhauthuongtru2, $hokhauthuongtru3, $hokhauthuongtru4, $hokhauthuongtru5,$hokhauthuongtru6);

					$noicutruhiennay1 = $diachi->get_id1($value['Y']);
					$noicutruhiennay2 = $diachi->get_id2($value['Y'], $value['X']);
					$noicutruhiennay3 = $diachi->get_id3($value['Y'], $value['X'], $value['W']);
					$noicutruhiennay4 = $diachi->get_id4($value['Y'], $value['X'], $value['W'], $value['V']);
					$noicutruhiennay5 = $diachi->get_id5($value['Y'], $value['X'], $value['W'], $value['V'],$value['U']);
					$noicutruhiennay6 = $value['T'];
					$noicutruhiennay = array($noicutruhiennay1, $noicutruhiennay2, $noicutruhiennay3, $noicutruhiennay4, $noicutruhiennay5,$noicutruhiennay6);
					
					$nghenghiep = $nganhnghe->get_id($value['X']);
					
					$diachilamviec1 = $diachi->get_id1($value['AF']);
					$diachilamviec2 = $diachi->get_id2($value['AF'], $value['AE']);
					$diachilamviec3 = $diachi->get_id3($value['AF'], $value['AE'], $value['AD']);
					$diachilamviec4 = $diachi->get_id4($value['AF'], $value['AE'], $value['AD'],$value['AC']);
					$diachilamviec5 = $diachi->get_id5($value['AF'], $value['AE'], $value['AD'],$value['AC'],$value['AB']);
					$diachilamviec6 = $value['AA'];
					$diachilamviec = array($diachilamviec1, $diachilamviec2,$diachilamviec3,$diachilamviec4,$diachilamviec5,$diachilamviec6);

					$id_tongiao = $tongiao->get_id($value['AH']);
					$id_trinhdo = $trinhdo->get_id($value['AI']);

					$congdan->id = $id;
				    $congdan->code = intval($value['A']);
				    $congdan->cmnd = $value['B'];
				    $congdan->passport = $value['C'];
				    $congdan->hoten = trim($value['D']);
				    $congdan->ngaysinh = $value['E'] ? new MongoDate(convert_date_dd_mm_yyyy($value['E'])) : '';
				    $congdan->gioitinh = $value['F'];
				    $congdan->quoctich = $id_quoctich ? array($id_quoctich) : ''; 
				    $congdan->noisinh = $noisinh;
				    $congdan->hokhauthuongtru = $hokhauthuongtru;
				    $congdan->noicutruhiennay = $noicutruhiennay;
				    $congdan->id_nganhnghe = $nghenghiep ? new MongoId($nghenghiep) : '';
				    $congdan->diachilamviec = $diachilamviec;
				    $congdan->quatrinhdaotao = $value['AG'];
				    $congdan->id_tongiao = $id_tongiao ? new MongoId($id_tongiao) : '';
				    $congdan->id_trinhdo = $id_trinhdo ? new MongoId($id_trinhdo) : '';
				    $congdan->dienthoaiban = $value['AJ'];
				    $congdan->didong = $value['AK'];
				    $congdan->fax = $value['AL'];
				    $congdan->email = $value['AM'];
				    $congdan->thongtinnguoilienhe = $value['AN'];
				    $congdan->id_user = $id_user;
					$congdan->insert();

					//---------------push hoc tap-----------------------------
					if($value['AO'] != ''){
						$id_hoctap = new MongoId();
						$id_quocgia_ht = $quocgia->get_id($value['AO']);
						$thoigianbatdau = $value['AP'];$thoigianketthuc = $value['AQ'];
						$id_hinhthuchoctap = $hinhthuchoctap->get_id($value['AR']);
						$id_nganhhoc_ht = $nganhhoc->get_id($value['AS']);
						$id_trinhdo_ht = $trinhdo->get_id($value['AT']);
						$id_coquancongtac = $coquancongtac->get_id($value['AU']);
						$arr_hoctap = array('id_hoctap' => new MongoId($id_hoctap),
							'id_quocgia' => $id_quocgia_ht ? new MongoId($id_quocgia_ht) : '',
							'thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
							'thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
							'id_nganhhoc' => $id_nganhhoc_ht ? new MongoId($id_nganhhoc_ht) : '',
							'id_hinhthuchoctap' => $id_hinhthuchoctap ? new MongoId($id_hinhthuchoctap) : '',
							'id_trinhdo' => $id_trinhdo_ht ? new MongoId($id_trinhdo_ht) : '',
							'id_coquancongtac' => $id_coquancongtac ? new MongoId($id_coquancongtac) : '',
							'date_post' => new MongoDate(),
							'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->hoctap = $arr_hoctap;
						$congdan->push_hoctap();
					}
					//----------------push Lao dong------------------------------
					if($value['AV'] != ''){
						$id_laodong = new MongoId();
						$id_quocgia_ld =  $quocgia->get_id($value['AV']);
						$thoigianbatdau_ld = trim($value['AW']);
						$thoigianketthuc_ld = trim($value['AX']);
						$id_nganhnghe_ld = $nganhnghe->get_id($value['AY']);
						$id_tinhtranglaodong = $tinhtranglaodong->get_id($value['AZ']);
						$coquanlaodong = $value['BA']; $diachicoquanlaodong = $value['BB'];
						$arr_laodong = array('id_laodong' => new MongoId($id_laodong),
		    				'id_quocgia' => $id_quocgia_ld ? new Mongoid($id_quocgia_ld) : '',
		    				'thoigianbatdau' => $thoigianbatdau_ld ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau_ld)) : '',
		    				'thoigianketthuc' => $thoigianketthuc_ld ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc_ld)) : '',
		    				'id_nganhnghe' => $id_nganhnghe_ld ? new MongoId($id_nganhnghe_ld) : '',
		    				'id_tinhtranglaodong' => $id_tinhtranglaodong ? new MongoId($id_tinhtranglaodong) : '',
		    				'coquanlaodong' => $coquanlaodong,
		    				'diachicoquanlaodong' => $diachicoquanlaodong,
		                    'date_post' => new MongoDate(),
		                    'id_user' => $id_user ? new MongoId($id_user) : '');
		    			$congdan->laodong = $arr_laodong;
		    			$congdan->push_laodong();
					}
					//-----------------Push ket hon----------------------
					if($value['BC'] > 0 && $value['BF']){
						//Thong tin chung nguoi nuoc ngoai
						$id_quoctich_nn = $quocgia->get_id($value['BI']);
						$noisinh1_nn = $diachi->get_id1($value['BO']);
						$noisinh2_nn = $diachi->get_id2($value['BO'], $value['BN']);
						$noisinh3_nn = $diachi->get_id3($value['BO'], $value['BN'], $value['BM']);
						$noisinh4_nn = $diachi->get_id4($value['BO'], $value['BN'], $value['BM'], $value['BL']);
						$noisinh5_nn = $diachi->get_id5($value['BO'], $value['BN'], $value['BM'], $value['BL'],$value['BK']);
						$noisinh6_nn = $value['BJ'];
						$noisinh_nn = array($noisinh1_nn, $noisinh2_nn, $noisinh3_nn, $noisinh4_nn, $noisinh5_nn,$noisinh6_nn);

						$hokhauthuongtru1_nn = $diachi->get_id1($value['BU']);
						$hokhauthuongtru2_nn = $diachi->get_id2($value['BU'], $value['BT']);
						$hokhauthuongtru3_nn = $diachi->get_id3($value['BO'], $value['BT'], $value['BS']);
						$hokhauthuongtru4_nn = $diachi->get_id4($value['BU'], $value['BT'], $value['BS'], $value['BR']);
						$hokhauthuongtru5_nn = $diachi->get_id5($value['BU'], $value['BT'], $value['BS'], $value['BR'],$value['BQ']);
						$hokhauthuongtru6_nn = $value['BP'];
						$hokhauthuongtru_nn = array($hokhauthuongtru1_nn, $hokhauthuongtru2_nn, $hokhauthuongtru3_nn, $hokhauthuongtru4_nn, $hokhauthuongtru5_nn,$hokhauthuongtru6_nn);

						$noicutruhiennay1_nn = $diachi->get_id1($value['CA']);
						$noicutruhiennay2_nn = $diachi->get_id2($value['CA'], $value['BZ']);
						$noicutruhiennay3_nn = $diachi->get_id3($value['CA'], $value['BZ'], $value['BY']);
						$noicutruhiennay4_nn = $diachi->get_id4($value['CA'], $value['BZ'], $value['BY'], $value['BX']);
						$noicutruhiennay5_nn = $diachi->get_id5($value['CA'], $value['BZ'], $value['BY'], $value['BX'],$value['BW']);
						$noicutruhiennay6_nn = $value['BV'];
						$noicutruhiennay_nn = array($noicutruhiennay1_nn, $noicutruhiennay2_nn, $noicutruhiennay3_nn, $noicutruhiennay4_nn, $noicutruhiennay5_nn, $noicutruhiennay6_nn);
						
						$nghenghiep_nn = $nganhnghe->get_id($value['CB']);
						
						$diachilamviec1_nn = $diachi->get_id1($value['CH']);
						$diachilamviec2_nn = $diachi->get_id2($value['CH'], $value['CG']);
						$diachilamviec3_nn = $diachi->get_id3($value['CH'], $value['CG'], $value['CF']);
						$diachilamviec4_nn = $diachi->get_id4($value['CH'], $value['CG'], $value['CF'],$value['CE']);
						$diachilamviec5_nn = $diachi->get_id5($value['CH'], $value['CG'], $value['CF'],$value['CE'],$value['CD']);
						$diachilamviec6_nn = $value['CC'];
						$diachilamviec_nn = array($diachilamviec1_nn, $diachilamviec2_nn,$diachilamviec3_nn,$diachilamviec4_nn,$diachilamviec5_nn,$diachilamviec6_nn);

						$id_tongiao_nn = $tongiao->get_id($value['CJ']);
						$id_trinhdo_nn = $trinhdo->get_id($value['CI']);

						$congdan->code = intval($value['BC']);
					    $congdan->cmnd = $value['BD'];
					    $congdan->passport = $value['BE'];
					    $congdan->hoten = trim($value['BF']);
					    $congdan->ngaysinh = $value['BG'] ? new MongoDate(convert_date_dd_mm_yyyy($value['BG'])) : '';
					    $congdan->gioitinh = $value['BH'];
					    $congdan->quoctich = $id_quoctich_nn ? array($id_quoctich_nn) : ''; 
					    $congdan->noisinh = $noisinh_nn;
					    $congdan->hokhauthuongtru = $hokhauthuongtru;
					    $congdan->noicutruhiennay = $noicutruhiennay_nn;
					    $congdan->id_nganhnghe = $nghenghiep_nn ? new MongoId($nghenghiep_nn) : '';
					    $congdan->diachilamviec = $diachilamviec_nn;
					    $congdan->quatrinhdaotao = $value['CI'];
					    $congdan->id_tongiao = $id_tongiao_nn ? new MongoId($id_tongiao_nn) : '';
					    $congdan->id_trinhdo = $id_trinhdo_nn ? new MongoId($id_trinhdo_nn) : '';
					    $congdan->dienthoaiban = $value['CL'];
					    $congdan->didong = $value['CM'];
					    $congdan->fax = $value['CN'];
					    $congdan->email = $value['CO'];
					    $congdan->thongtinnguoilienhe = $value['CP'];
					    $congdan->id_user = $id_user;
					    if($congdan->check_exist_code($value['BC'])){
					    	$id_nn = $congdan->get_id_by_code($value['BC']);
					    } else{
					    	$id_nn = new MongoId();
					    	$congdan->id = $id_nn;
					    	$congdan->insert();
					    }
						$id_kethon = new MongoId();
						$ngaykethon = $value['CQ'];
						$arr_kethon = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
							'id_congdannuocngoai' => $id_nn ? new MongoId($id_nn) : '',
							'ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '',
							'date_post' => new MongoDate(),
		                	'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->id = $id; $congdan->kethon = $arr_kethon;$congdan->push_kethon();
						
						$arr_kethon_nn = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
							'id_congdannuocngoai' => $id ? new MongoId($id) : '',
							'ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '',
							'date_post' => new MongoDate(),
				        	'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->id = $id_nn; $congdan->kethon = $arr_kethon_nn; $congdan->push_kethon();
					}

					//------------------------Push Di cu---------------------------------
					if($value['CR'] != ''){
						$id_dicu = new MongoId();
						$id_quocgia_dc = $quocgia->get_id($value['CR']);
						$ngaydicu = $value['CS'];
						$id_diendicu = $diendicu->get_id($value['CT']);
	    				$arr_dicu = array('id_dicu' => new MongoId($id_dicu),
	    					'id_quocgia' => $id_quocgia_dc ? new MongoId($id_quocgia_dc) : '',
	    					'ngaydicu' => $ngaydicu ? new MongoDate(convert_date_dd_mm_yyyy($ngaydicu)) : '',
	    					'id_diendicu' => $id_diendicu ? new MongoId($id_diendicu) : '',
	                        'date_post' => new MongoDate(),
	                        'id_user' => $id_user ? new MongoId($id_user) : '');
	    				$congdan->id = $id;$congdan->dicu = $arr_dicu;$congdan->push_dicu();
					}

					//------------------------Push Dinh cu---------------------------------
					if($value['CU'] != ''){
						$id_dinhcu = new MongoId();
						$id_quocgia_dinhcu = $quocgia->get_id($value['CU']);
						$ngaynhaptich = $value['CV'];
	    				$arr_dinhcu = array('id_dinhcu' => new MongoId($id_dinhcu),
	    					'id_quocgia' => $id_quocgia_dinhcu ? new MongoId($id_quocgia_dinhcu) : '',
	    					'ngaynhaptich' => $ngaynhaptich ? new MongoDate(convert_date_dd_mm_yyyy($ngaynhaptich)) : '',
	    					'date_post' => new MongoDate(),
	                        'id_user' => $id_user ? new MongoId($id_user) : '');
    					$congdan->id = $id; $congdan->dinhcu = $arr_dinhcu;$congdan->push_dinhcu();
					}

					//------------------------Push Tri thuc---------------------------------
					if($value['CW'] != '' && $value['CZ'] != ''){
						$id_trithuc = new MongoId();
						$id_nganhhoc_tt = $nganhhoc->get_id($value['CW']);
						$thoigianbatdau_tt = $value['CX'];
						$thoigianketthuc_tt = $value['CY'];
						$noidunglamviec = $value['CZ'];
						$arr_trithuc = array('id_trithuc' => $id_trithuc ? new MongoId($id_trithuc) : '',
							'id_nganhhoc' => $id_nganhhoc_tt ? new MongoId($id_nganhhoc_tt) : '',
							'thoigianbatdau' => $thoigianbatdau_tt ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau_tt)) : '',
							'thoigianketthuc' => $thoigianketthuc_tt ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc_tt)) : '',
							'noidunglamviec' => $noidunglamviec ? $noidunglamviec : '',
							'date_post' => new MongoDate(),
							'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->id = $id;$congdan->trithuc = $arr_trithuc;$congdan->push_trithuc();
					}
					//------------------------Push Doanh nhan---------------------------------
					$id_doanhnghiep = $doangnghiep->get_id($value['DA']);
					if($value['DA'] != '' && $id_doanhnghiep){
						$id_doanhnhan = new MongoId();
						$chucvu = $value['DB'];$donvitien = $value['DC'];
						$sotien = $value['DD']; $tygia = $value['DE'];
						$VND = $value['DF'];
						$arr_doanhnhan = array(
							'id_doanhnhan' => $id_doanhnhan ? new  MongoId($id_doanhnhan) : '',
							'id_doanhnghiep' => $id_doanhnghiep ? new MongoId($id_doanhnghiep) : '',
							'chucvu' => $chucvu,
							'donvitien' => $donvitien ? $donvitien : '',
							'sotien' => $sotien ? $sotien : '',
							'tygia' => $tygia ? $tygia : '',
							'VND' => $VND ? $VND : '',
							'date_post' => new MongoDate(),
							'id_user' => $id_user ? new MongoId($id_user) : ''
						);
						$congdan->id = $id; $congdan->doanhnhan = $arr_doanhnhan;$congdan->push_doanhnhan();
					}
					//------------------------Push Gia dinh---------------------------------
					$id_congdanquanhe = $congdan->get_id_by_code($value['DG']);
					if($value['DG'] != '' && $id_congdanquanhe){
						$id_giadinh = new MongoId();					
						$quanhegiadinh1 = $value['DH']; $quanhegiadinh2 = $value['DI'];
						$arr_giadinh = array('id_giadinh' => $id_giadinh ? new MongoId($id_giadinh) : '',
							'id_congdanquanhe' => $id_congdanquanhe ? new MongoId($id_congdanquanhe) : '',
							'quanhegiadinh1' => trim($quanhegiadinh1),'quanhegiadinh2' => trim($quanhegiadinh2),
							'date_post' => new MongoDate(),
		                	'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->id = $id; $congdan->giadinh = $arr_giadinh;$congdan->push_giadinh();

						$arr_giadinh_nn = array('id_giadinh' => $id_giadinh ? new MongoId($id_giadinh) : '',
							'id_congdanquanhe' => $id ? new MongoId($id) : '',
							'quanhegiadinh1' => trim($quanhegiadinh2),'quanhegiadinh2' => trim($quanhegiadinh1),
							'date_post' => new MongoDate(),
				        	'id_user' => $id_user ? new MongoId($id_user) : '');
						$congdan->id = $id_congdanquanhe;
						$congdan->giadinh = $arr_giadinh_nn; $congdan->push_giadinh();
					}
				}
				echo '<tr '.$classes.'>';
				echo '<td>'.$value['A'].'</td>';
				echo '<td>'.$value['B'].'</td>';
				echo '<td>'.$value['C'].'</td>';
				echo '<td>'.$value['D'].'</td>';
				echo '<td>'.$value['E'].'</td>';
				echo '<td>'.$value['F'].'</td>';
				echo '<td>'.$value['G'].'</td>';
				echo '<td>'.$value['H'].'</td>';
				echo '<td>'.$value['I'].'</td>';
				echo '<td>'.$value['J'].'</td>';
				echo '<td>'.$value['K'].'</td>';
				echo '<td>'.$value['L'].'</td>';
				echo '<td>'.$value['M'].'</td>';
				echo '<td>'.$value['N'].'</td>';
				echo '<td>'.$value['O'].'</td>';
				echo '<td>'.$value['P'].'</td>';
				echo '<td>'.$value['Q'].'</td>';
				echo '<td>'.$value['R'].'</td>';
				echo '<td>'.$value['S'].'</td>';
				echo '<td>'.$value['T'].'</td>';
				echo '<td>'.$value['U'].'</td>';
				echo '<td>'.$value['V'].'</td>';
				echo '<td>'.$value['W'].'</td>';
				echo '<td>'.$value['X'].'</td>';
				echo '<td>'.$value['Y'].'</td>';
				echo '<td>'.$value['Z'].'</td>';
				echo '<td>'.$value['AA'].'</td>';
				echo '<td>'.$value['AB'].'</td>';
				echo '<td>'.$value['AC'].'</td>';
				echo '<td>'.$value['AD'].'</td>';
				echo '<td>'.$value['AE'].'</td>';
				echo '<td>'.$value['AF'].'</td>';
				echo '<td>'.$value['AG'].'</td>';
				echo '<td>'.$value['AH'].'</td>';
				echo '<td>'.$value['AI'].'</td>';
				echo '<td>'.$value['AJ'].'</td>';
				echo '<td>'.$value['AK'].'</td>';
				echo '<td>'.$value['AL'].'</td>';
				echo '<td>'.$value['AM'].'</td>';
				echo '<td>'.$value['AN'].'</td>';
				echo '<td>'.$value['AO'].'</td>';
				echo '<td>'.$value['AP'].'</td>';
				echo '<td>'.$value['AQ'].'</td>';
				echo '<td>'.$value['AR'].'</td>';
				echo '<td>'.$value['AS'].'</td>';
				echo '<td>'.$value['AT'].'</td>';
				echo '<td>'.$value['AU'].'</td>';
				echo '<td>'.$value['AV'].'</td>';
				echo '<td>'.$value['AW'].'</td>';
				echo '<td>'.$value['AX'].'</td>';
				echo '<td>'.$value['AY'].'</td>';
				echo '<td>'.$value['AZ'].'</td>';
				echo '<td>'.$value['BA'].'</td>';
				echo '<td>'.$value['BB'].'</td>';
				echo '<td>'.$value['BC'].'</td>';
				echo '<td>'.$value['BD'].'</td>';
				echo '<td>'.$value['BE'].'</td>';
				echo '<td>'.$value['BF'].'</td>';
				echo '<td>'.$value['BG'].'</td>';
				echo '<td>'.$value['BH'].'</td>';
				echo '<td>'.$value['BI'].'</td>';
				echo '<td>'.$value['BJ'].'</td>';
				echo '<td>'.$value['BK'].'</td>';
				echo '<td>'.$value['BL'].'</td>';
				echo '<td>'.$value['BM'].'</td>';
				echo '<td>'.$value['BN'].'</td>';
				echo '<td>'.$value['BO'].'</td>';
				echo '<td>'.$value['BP'].'</td>';
				echo '<td>'.$value['BQ'].'</td>';
				echo '<td>'.$value['BR'].'</td>';
				echo '<td>'.$value['BS'].'</td>';
				echo '<td>'.$value['BT'].'</td>';
				echo '<td>'.$value['BU'].'</td>';
				echo '<td>'.$value['BV'].'</td>';
				echo '<td>'.$value['BW'].'</td>';
				echo '<td>'.$value['BX'].'</td>';
				echo '<td>'.$value['BY'].'</td>';
				echo '<td>'.$value['BZ'].'</td>';
				echo '<td>'.$value['CA'].'</td>';
				echo '<td>'.$value['CB'].'</td>';
				echo '<td>'.$value['CC'].'</td>';
				echo '<td>'.$value['CD'].'</td>';
				echo '<td>'.$value['CE'].'</td>';
				echo '<td>'.$value['CF'].'</td>';
				echo '<td>'.$value['CG'].'</td>';
				echo '<td>'.$value['CH'].'</td>';
				echo '<td>'.$value['CI'].'</td>';
				echo '<td>'.$value['CJ'].'</td>';
				echo '<td>'.$value['CK'].'</td>';
				echo '<td>'.$value['CL'].'</td>';
				echo '<td>'.$value['CM'].'</td>';
				echo '<td>'.$value['CN'].'</td>';
				echo '<td>'.$value['CO'].'</td>';
				echo '<td>'.$value['CP'].'</td>';
				echo '<td>'.$value['CQ'].'</td>';
				echo '</tr>';
			}
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>
