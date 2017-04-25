<?php
require_once('header.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$doanhnghiep = new DoanhNghiep();

if($id && $action == 'del'){
	$doanhnghiep->id = $id;
	if($doanhnghiep->delete()){
		transfers_to('doanhnghiep.php');
	}
}
$valid_formats = array("jpg", "png", "gif", "jpeg");
$max_file_size = 10*1024*1024; //10MB
$path = "images/uploads/"; // Upload directory

if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tendoanhnghiep = isset($_POST['tendoanhnghiep']) ? $_POST['tendoanhnghiep'] : '';
	$diachi1 = isset($_POST['diachi1']) ? $_POST['diachi1'] : '';
	$diachi2 = isset($_POST['diachi2']) ? $_POST['diachi2'] : '';
	$diachi3 = isset($_POST['diachi3']) ? $_POST['diachi3'] : '';
	$diachi4 = isset($_POST['diachi4']) ? $_POST['diachi4'] : '';
	$diachi5 = isset($_POST['diachi5']) ? $_POST['diachi5'] : '';
	$diachi6 = isset($_POST['diachi6']) ? $_POST['diachi6'] : '';

	$sodkkd = isset($_POST['sodkkd']) ? $_POST['sodkkd'] : '';
	$vondkkd = isset($_POST['vondkkd']) ? convert_string_number($_POST['vondkkd']) : '';
	$ngaydkkd= isset($_POST['ngaydkkd']) ? $_POST['ngaydkkd'] : '';
	$hinhthucdautu = isset($_POST['hinhthucdautu']) ? $_POST['hinhthucdautu'] : '';
	$tinhtranghoatdong = isset($_POST['tinhtranghoatdong']) ? $_POST['tinhtranghoatdong'] : '';
	$linhvuckinhdoanh = isset($_POST['linhvuckinhdoanh']) ? $_POST['linhvuckinhdoanh'] : '';
	$ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
	$diachi = array($diachi1,$diachi2,$diachi3,$diachi4,$diachi5,$diachi6);
	$old_logo = isset($_POST['old_logo']) ? $_POST['old_logo'] : '';
	
	if($_FILES['logo']['name']){
		$logo = date('Ymdhsi') . '_' . basename($_FILES["logo"]["name"]);
		$imageFileType = pathinfo(basename($_FILES["logo"]["name"]),PATHINFO_EXTENSION);
		$filesize = $_FILES["logo"]["size"];
		$old_logo = $_POST['old_logo'];
		if(in_array(strtolower($imageFileType), $valid_formats) && $filesize <= $max_file_size){
			if(move_uploaded_file($_FILES["logo"]["tmp_name"], $path . $logo)){
				unlink($path . $old_logo);
			} else {
				$logo = $old_logo ? $old_logo : 'default_logo.png';
			}
		} else {
			$logo = $old_logo ? $old_logo : 'default_logo.png';
		}
	} else {
		$logo = $old_logo ? $old_logo : 'default_logo.png';
	}	
	$doanhnghiep->id = $id;
	$doanhnghiep->ten = $tendoanhnghiep;
	$doanhnghiep->diachi = $diachi;
	$doanhnghiep->sodkkd = $sodkkd;
	$doanhnghiep->vondkkd = $vondkkd;
	$doanhnghiep->ngaydkkd = $ngaydkkd ? new MongoDate(convert_date_dd_mm_yyyy($ngaydkkd)) : '';
	$doanhnghiep->hinhthucdautu = $hinhthucdautu;
	$doanhnghiep->tinhtranghoatdong = $tinhtranghoatdong;
	$doanhnghiep->linhvuckinhdoanh = $linhvuckinhdoanh;
	$doanhnghiep->ghichu = $ghichu;
	$doanhnghiep->logo = $logo;

	if($id){
		//edit
		$doanhnghiep->edit();
		transfers_to('doanhnghiep.php');
	} else {
		$doanhnghiep->insert();
		transfers_to('doanhnghiep.php');
	}
}
?>

<?php require_once('footer.php'); ?>