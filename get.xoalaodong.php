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
$id_laodong = isset($_GET['id_laodong']) ? $_GET['id_laodong'] : '';

$laodong = array('laodong' => array('id_laodong' => new MongoId($id_laodong)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->laodong = $laodong;
if($congdan->pull_laodong()){
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>