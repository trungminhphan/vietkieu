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
$id_kethon = isset($_GET['id_kethon']) ? $_GET['id_kethon'] : '';
$id_congdannuocngoai = isset($_GET['id_congdannuocngoai']) ? $_GET['id_congdannuocngoai'] : '';

$kethon = array('kethon' => array('id_kethon' => new MongoId($id_kethon)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->kethon = $kethon;
if($congdan->pull_kethon()){
	$congdan->id = $id_congdannuocngoai; $congdan->pull_kethon();
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>