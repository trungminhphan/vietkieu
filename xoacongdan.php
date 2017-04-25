<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$congdan->id = $id;

if($congdan->delete()){
	//$arr = array('flag' => 'OK', 'text' => 'Xoá thành công');
	transfers_to('timcongdan.php');
} else {
	//$arr = array('flag' => 'NO', 'text' => 'Xoá thất bại');
}
//echo json_encode($arr);
?>