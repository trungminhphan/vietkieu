<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan(); $nganhhoc = new NganhHoc();

$id_trithuc = isset($_POST['id_trithuc']) ? $_POST['id_trithuc'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$thoigianbatdau = isset($_POST['thoigianbatdau']) ? $_POST['thoigianbatdau'] : '';
$thoigianketthuc = isset($_POST['thoigianketthuc']) ? $_POST['thoigianketthuc'] : '';
$id_nganhhoc = isset($_POST['id_nganhhoc']) ? $_POST['id_nganhhoc'] : '';
$noidunglamviec = isset($_POST['noidunglamviec']) ? $_POST['noidunglamviec'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;

if($id_trithuc){
	$congdan->id_trithuc = $id_trithuc;
	$arr_trithuc = array('trithuc.$.id_nganhhoc' => $id_nganhhoc ? new MongoId($id_nganhhoc) : '',
						'trithuc.$.thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
						'trithuc.$.thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
						'trithuc.$.noidunglamviec' => $noidunglamviec ? $noidunglamviec : '');
	$congdan->trithuc = $arr_trithuc;
	if($congdan->set_trithuc()){
		if($id_nganhhoc) { $nganhhoc->id = $id_nganhhoc; $lv = $nganhhoc->get_one(); }
		echo '<tr class="items '.$id_trithuc.'">';
	    echo '<td>'.$lv['ten'].'</td>';
	    echo '<td>'.($thoigianbatdau ? $thoigianbatdau : '').'</td>';
	    echo '<td>'.($thoigianketthuc ? $thoigianketthuc : '').'</td>';
	    echo '<td>'.$noidunglamviec . '</td>';
	    echo '<td><a href="get.xoatrithuc.php?id_congdan='.$id_congdan .'&id_trithuc='.$id_trithuc.'" class="xoatrithuc" onclick="return false;"><span class="mif-bin"></span></a></td>';
	    echo '<td><a href="get.suatrithuc.php?id_congdan='.$id_congdan .'&id_trithuc='.$id_trithuc.'" class="suatrithuc" onclick="return false;"><span class="mif-pencil"></span></a></td>';
	    echo '</tr>';
	} else {
		echo 'Failed';
	}
} else {
	$id_trithuc = new MongoId();
	$arr_trithuc = array('id_trithuc' => $id_trithuc ? new MongoId($id_trithuc) : '',
						'id_nganhhoc' => $id_nganhhoc ? new MongoId($id_nganhhoc) : '',
						'thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
						'thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
						'noidunglamviec' => $noidunglamviec ? $noidunglamviec : '',
						'date_post' => new MongoDate(),
						'id_user' => $id_user ? new MongoId($id_user) : '');
	$congdan->trithuc = $arr_trithuc;
	if($congdan->push_trithuc()){
		if($id_nganhhoc) { $nganhhoc->id = $id_nganhhoc; $lv = $nganhhoc->get_one(); }
		echo '<tr class="items '.$id_trithuc.'">';
	    echo '<td>'.$lv['ten'].'</td>';
	    echo '<td>'.($thoigianbatdau ? $thoigianbatdau : '').'</td>';
	    echo '<td>'.($thoigianketthuc ? $thoigianketthuc : '').'</td>';
	    echo '<td>'.$noidunglamviec . '</td>';
	    echo '<td><a href="get.xoatrithuc.php?id_congdan='.$id_congdan .'&id_trithuc='.$id_trithuc.'" class="xoatrithuc" onclick="return false;"><span class="mif-bin"></span></a></td>';
	    echo '<td><a href="get.suatrithuc.php?id_congdan='.$id_congdan .'&id_trithuc='.$id_trithuc.'" class="suatrithuc" onclick="return false;"><span class="mif-pencil"></span></a></td>';
	    echo '</tr>';
	} else {
		echo 'Failed';
	}
}
?>