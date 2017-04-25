<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$id_congdan = isset($_GET['id_congdan']) ? $_GET['id_congdan'] : '';
$id_giadinh = isset($_GET['id_giadinh']) ? $_GET['id_giadinh'] : '';
$id_congdanquanhe = isset($_GET['id_congdanquanhe']) ? $_GET['id_congdanquanhe'] : '';

$giadinh = array('giadinh' => array('id_giadinh' => new MongoId($id_giadinh)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->giadinh = $giadinh;
if($congdan->pull_giadinh()){
	$congdan->id = $id_congdanquanhe; $congdan->pull_giadinh();
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>