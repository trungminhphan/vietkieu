<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
require_once('cls/PHPExcel.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php');}

$columns = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
					'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
					'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
					'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
					'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
$index = 0;
$arr_export = array(
	'quoctich' => 'Quốc tịch', 'noisinh' => 'Nơi sinh',
	'hokhauthuongtru' => 'Hộ khẩu thường trú', 'noicutruhiennay' => 'Nơi cư trú hiện nay',
	'id_nganhnghe' => 'Ngành nghề', 'diachilamviec' => 'Địa chỉ làm việc',
	'quatrinhdaotao' => 'Quá trình đào tạo', 'id_tongiao'=> 'Tôn giáo',
	'id_trinhdo' => 'Trình độ', 'dienthoaiban' => 'Điện thoại bàn','didong' => 'Di động',
	'email' => 'Email',	'fax' => 'Fax',	'thongtinnguoilienhe' => 'Thông tin liên hệ'
);
$arr_query = array('_id', 'code', 'cmnd', 'passport', 'hoten', 'ngaysinh', 'gioitinh');
$congdan = new CongDan();$quocgia = new QuocGia(); $arr_quoctich = array();$arr_str = array();
$diachi = new DiaChi();

if(isset($_POST['submit'])){
	foreach ($arr_export as $key => $value) {
		$$key = isset($_POST[$key]) ? $_POST[$key] : '';
		if($$key){
			array_push($arr_query, $key);
			array_push($arr_str, $value);
		}
	}

    $inputFileName = 'templates/export.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("xuat du lieu cong dan");
	$objPHPExcel->setActiveSheetIndex(0);
	$i=1;
	$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, 'ID');$index++;
	$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, 'CMND/Passport');$index++;
	$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, 'Họ tên');$index++;
	$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, 'Ngày sinh');$index++;
	$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, 'Giới tính');$index++;
	foreach ($arr_query as $k => $v) {
		if($v && $k > 6){
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $arr_export[$v]);$index++;
		}
	}
	$i++;$index=0;
	$congdan_list = $congdan->get_list_fields(array(), $arr_query);
	if(isset($congdan_list) && $congdan_list){
		foreach ($congdan_list as $cd) {
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd['code']);$index++;
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd['cmnd'] .'/'.$cd['passport']);$index++;
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd['hoten']);$index++;
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '');$index++;
			$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd['gioitinh']);$index++;
			foreach ($arr_query as $k => $v) {
				if($v && $k > 6){
					if($v=='quoctich'){
						if(isset($cd['quoctich']) && $cd['quoctich']){
							$str_quoctich = $quocgia->get_quoctich($cd['quoctich']);
						} else { $str_quoctich = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_quoctich);$index++;
					} else if ($v=='noisinh') {
						if(isset($cd['noisinh']) & $cd['noisinh']){
							$str_noisinh = $diachi->tendiachi($cd['noisinh']);
						} else { $str_noisinh = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_noisinh);$index++;
					} else if($v=='hokhauthuongtru'){
						if(isset($cd['hokhauthuongtru']) & $cd['hokhauthuongtru']){
							$str_hktt = $diachi->tendiachi($cd['hokhauthuongtru']);
						} else { $str_hktt = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_hktt);$index++;
					} else if($v=='noicutruhiennay'){
						if(isset($cd['noicutruhiennay']) & $cd['noicutruhiennay']){
							$str_noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
						} else { $str_noicutruhiennay = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_noicutruhiennay);$index++;
					} else if($v=='id_nganhnghe'){
						if(isset($cd['id_nganhnghe']) & $cd['id_nganhnghe']){
							$nganhnghe = new NganhNghe();$nganhnghe->id = $cd['id_nganhnghe'];
                			$nn = $nganhnghe->get_one(); $str_nganhnghe = $nn['ten'];
						} else { $str_nganhnghe = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_nganhnghe);$index++;
					} else if($v=='diachilamviec'){
						if(isset($cd['diachilamviec']) & $cd['diachilamviec']){
                			$str_diachilamviec = $diachi->tendiachi($cd['diachilamviec']);
						} else { $str_diachilamviec = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_diachilamviec);$index++;
					} else if($v=='id_tongiao'){
						if(isset($cd['id_tongiao']) & $cd['id_tongiao']){
                			$tongiao = new TonGiao();$tongiao->id = $cd['id_tongiao'];
		                	$tg = $tongiao->get_one();$str_tongiao = $tg['ten'];
						} else { $str_tongiao = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_tongiao);$index++;
					} else if($v=='id_trinhdo'){
						if(isset($cd['id_trinhdo']) & $cd['id_trinhdo']){
                			$trinhdo = new TrinhDo();$trinhdo->id = $cd['id_trinhdo'];
                			$td = $trinhdo->get_one();$str_trinhdo = $td['ten'];
						} else { $str_trinhdo = ''; }
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $str_trinhdo);$index++;
					} else {
						$objPHPExcel->setActiveSheetIndex()->setCellValue($columns[$index].$i, $cd[$v]);$index++;
					}
				}
			}
			$i++;$index=0;
		}
	}
	// Redirect output to a client’s web browser (Excel2007)
	//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="export_congdan.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
}
?>