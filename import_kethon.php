<?php
require_once('header.php');
require_once('cls/PHPExcel/IOFactory.php');

$filename = isset($_GET['filename']) ? $_GET['filename'] : '';
if(isset($_POST['submit'])){
	$target_dir = "uploads/";
	$file_name = date("Ymdhsi") .'_'. basename($_FILES["filename"]["name"]);
	$target_file = $target_dir . $file_name;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
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
		transfers_to('import_kethon.php?filename=' . $file_name);
	} else {
		transfers_to('import_kethon.php');
	}
}
?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Import dữ liệu Kết hôn</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="kethonform" enctype="multipart/form-data">
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
				<a href="templates/kethon-v1.xlsx" class="button"><span class="mif-file-download"> File mẫu</span></a>
			</div>
		</div>
	</div>
</form>

<?php if($filename): ?>
<table class="table striped hovered border bordered">
<thead>
<tr>
	<th rowspan="2">ID</th>
	<th rowspan="2">CMND</th>
	<th rowspan="2">Passport</th>
	<th rowspan="2">Họ tên</th>
	<th rowspan="2">Ngày sinh</th>
	<th rowspan="2">Giới tính</th>
	<th rowspan="2">Quốc tịch</th>
	<th colspan="3" align="center">Nơi sinh</th>
	<th colspan="3">Nơi cư trú hiện nay</th>
	<th rowspan="2">Nghề nghiệp</th>
	<th colspan="3">Địa chỉ làm việc</th>
	<th rowspan="2">Quá trình đào tạo</th>
	<th rowspan="2">Tôn giáo</th>
	<th rowspan="2">Trình độ học vấn</th>
	<th rowspan="2">Điện thoại</th>
	<th rowspan="2">Mobile</th>
	<th rowspan="2">Fax</th>
	<th rowspan="2">Email</th>
	<th rowspan="2">Thông tin liên hệ</th>
	<th rowspan="2">ID</th>
	<th rowspan="2">CMND</th>
	<th rowspan="2">Passport</th>
	<th rowspan="2">Họ tên</th>
	<th rowspan="2">Ngày sinh</th>
	<th rowspan="2">Giới tính</th>
	<th rowspan="2">Quốc tịch</th>
	<th colspan="3" align="center">Nơi sinh</th>
	<th colspan="3">Nơi cư trú hiện nay</th>
	<th rowspan="2">Nghề nghiệp</th>
	<th colspan="3">Địa chỉ làm việc</th>
	<th rowspan="2">Quá trình đào tạo</th>
	<th rowspan="2">Tôn giáo</th>
	<th rowspan="2">Trình độ học vấn</th>
	<th rowspan="2">Điện thoại</th>
	<th rowspan="2">Mobile</th>
	<th rowspan="2">Fax</th>
	<th rowspan="2">Email</th>
	<th rowspan="2">Thông tin liên hệ</th>
	<th rowspan="2">Ngày kết hôn</th>
</tr>
<tr>
	<th>Huyện</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Huyện</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Huyện</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Huyện</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Huyện</th>
	<th>Tỉnh</th>
	<th>Quốc Gia</th>
	<th>Huyện</th>
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
	$nganhhoc = new NganhHoc();$coquancongtac = new CoQuanCongTac();
	if($sheetData){
		foreach($sheetData as $key => $value){
			if($key >= 4 && $value['A'] > 0 && $value['B']){
				if($congdan->check_exist_code($value['A'])) {
					$classes = 'class="bg-red fg-white"';
				} else {
					$classes = '';
					$id_cdvn = new MongoId();
					$id_quoctich = $quocgia->get_id($value['G']);
					$noisinh3 = $diachi->get_id3($value['J'], $value['I'], $value['H']);
					$noisinh2 = $diachi->get_id2($value['J'], $value['I']);
					$noisinh1 = $diachi->get_id1($value['J']);
					$noisinh = array($noisinh1, $noisinh2, $noisinh3, '', '' ,'');

					$noicutruhiennay3 = $diachi->get_id3($value['M'], $value['L'], $value['K']);
					$noicutruhiennay2 = $diachi->get_id2($value['M'], $value['L']);
					$noicutruhiennay1 = $diachi->get_id1($value['M']);
					$noicutruhiennay = array($noicutruhiennay1, $noicutruhiennay2, $noicutruhiennay3, '', '','');
					
					$nghenghiep = $nganhnghe->get_id($value['N']);
					$id_tongiao = $tongiao->get_id($value['S']);
					$id_trinhdo = $trinhdo->get_id($value['T']);
					$diachilamviec3 = $diachi->get_id3($value['Q'], $value['P'], $value['O']);
					$diachilamviec2 = $diachi->get_id2($value['Q'], $value['P']);
					$diachilamviec1 = $diachi->get_id1($value['Q']);
					$diachilamviec = array($diachilamviec1, $diachilamviec2,$diachilamviec3,'','','');

					$congdan->id = $id_cdvn;
				    $congdan->code = $value['A'];
				    $congdan->cmnd = $value['B'];
				    $congdan->passport = $value['C'];
				    $congdan->hoten = trim($value['D']);
				    $congdan->ngaysinh = $value['E'] ? new MongoDate(convert_date_dd_mm_yyyy($value['E'])) : '';
				    $congdan->gioitinh = $value['F'];
				    $congdan->quoctich = $id_quoctich ? array($id_quoctich) : ''; 
				    $congdan->noisinh = $noisinh;
				    $congdan->noicutruhiennay = $noicutruhiennay;
				    $congdan->id_nganhnghe = $nghenghiep ? new MongoId($nghenghiep) : '';
				    $congdan->diachilamviec = $diachilamviec;
				    $congdan->quatrinhdaotao = $value['R'];
				    $congdan->id_tongiao = $id_tongiao ? new MongoId($id_tongiao) : '';
				    $congdan->id_trinhdo = $id_trinhdo ? new MongoId($id_trinhdo) : '';
				    $congdan->dienthoaiban = $value['U'];
				    $congdan->didong = $value['V'];
				    $congdan->email = $value['W'];
				    $congdan->fax = $value['X'];
				    $congdan->thongtinnguoilienhe = $value['Y'];
				    $congdan->id_user = $id_user;
					$congdan->insert();

					//Thong tin cong dan nuoc ngoai...
					$id_cdnn = new MongoId();
					$id_quoctich = $quocgia->get_id($value['AF']);
					$noisinh3 = $diachi->get_id3($value['AI'], $value['AH'], $value['AG']);
					$noisinh2 = $diachi->get_id2($value['AI'], $value['AH']);
					$noisinh1 = $diachi->get_id1($value['AI']);
					$noisinh = array($noisinh1, $noisinh2, $noisinh3, '', '' ,'');

					$noicutruhiennay3 = $diachi->get_id3($value['AL'], $value['AK'], $value['AJ']);
					$noicutruhiennay2 = $diachi->get_id2($value['AL'], $value['AK']);
					$noicutruhiennay1 = $diachi->get_id1($value['AL']);
					$noicutruhiennay = array($noicutruhiennay1, $noicutruhiennay2, $noicutruhiennay3, '', '','');
					
					$nghenghiep = $nganhnghe->get_id($value['AM']);
					$id_tongiao = $tongiao->get_id($value['AR']);
					$id_trinhdo = $trinhdo->get_id($value['AS']);
					$diachilamviec3 = $diachi->get_id3($value['AP'], $value['AO'], $value['AN']);
					$diachilamviec2 = $diachi->get_id2($value['AP'], $value['AO']);
					$diachilamviec1 = $diachi->get_id1($value['AP']);
					$diachilamviec = array($diachilamviec1, $diachilamviec2,$diachilamviec3,'','','');

					$congdan->id = $id_cdnn;
				    $congdan->code = $value['Z'];
				    $congdan->cmnd = $value['AA'];
				    $congdan->passport = $value['AB'];
				    $congdan->hoten = trim($value['AC']);
				    $congdan->ngaysinh = $value['AD'] ? new MongoDate(convert_date_dd_mm_yyyy($value['AD'])) : '';
				    $congdan->gioitinh = $value['AE'];
				    $congdan->quoctich = $id_quoctich ? array($id_quoctich) : ''; 
				    $congdan->noisinh = $noisinh;
				    $congdan->noicutruhiennay = $noicutruhiennay;
				    $congdan->id_nganhnghe = $nghenghiep ? new MongoId($nghenghiep) : '';
				    $congdan->diachilamviec = $diachilamviec;
				    $congdan->quatrinhdaotao = $value['AQ'];
				    $congdan->id_tongiao = $id_tongiao ? new MongoId($id_tongiao) : '';
				    $congdan->id_trinhdo = $id_trinhdo ? new MongoId($id_trinhdo) : '';
				    $congdan->dienthoaiban = $value['AT'];
				    $congdan->didong = $value['AU'];
				    $congdan->email = $value['AW'];
				    $congdan->fax = $value['AV'];
				    $congdan->thongtinnguoilienhe = $value['AX'];
				    $congdan->id_user = $id_user;
					$congdan->insert();

					$ngaykethon = $value['AY'] ? new MongoDate(convert_date_dd_mm_yyyy($value['AY'])) : '';
					//push cong dan
					$congdan->id = $id_cdvn;
					$id_kethon = new MongoId();
					$arr_kethon = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
						'id_congdannuocngoai' => $id_cdnn ? new MongoId($id_cdnn) : '',
						'ngaykethon' => $ngaykethon ? $ngaykethon : '',
						'date_post' => new MongoDate(),
	                	'id_user' => $id_user ? new MongoId($id_user) : '');
					$congdan->kethon = $arr_kethon;
					$congdan->push_kethon();

					$congdan->id = $id_cdnn;
					$arr_kethon_nn = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
						'id_congdannuocngoai' => $id_cdvn ? new MongoId($id_cdvn) : '',
						'ngaykethon' => $ngaykethon ? $ngaykethon : '',
						'date_post' => new MongoDate(),
	                	'id_user' => $id_user ? new MongoId($id_user) : '');
					$congdan->kethon = $arr_kethon_nn;
					$congdan->push_kethon();					
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
				//Nuoc ngoai
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
				echo '</tr>';
			}
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>
