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
$id_doanhnhan = isset($_GET['id_doanhnhan']) ? $_GET['id_doanhnhan'] : '';

$doanhnhan = array('doanhnhan' => array('id_doanhnhan' => new MongoId($id_doanhnhan)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->doanhnhan = $doanhnhan;
if($congdan->pull_doanhnhan()){
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>