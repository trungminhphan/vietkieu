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
$id_dinhcu = isset($_GET['id_dinhcu']) ? $_GET['id_dinhcu'] : '';

$dinhcu = array('dinhcu' => array('id_dinhcu' => new MongoId($id_dinhcu)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->dinhcu = $dinhcu;
if($congdan->pull_dinhcu()){
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>