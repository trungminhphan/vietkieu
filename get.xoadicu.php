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
$id_dicu = isset($_GET['id_dicu']) ? $_GET['id_dicu'] : '';

$dicu = array('dicu' => array('id_dicu' => new MongoId($id_dicu)));
$congdan = new CongDan();
$congdan->id = $id_congdan; $congdan->dicu = $dicu;
if($congdan->pull_dicu()){
	echo 'Xoá thành công';
} else {
	echo 'Không thể xoá.';
}
?>