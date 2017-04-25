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

$id_congdan = isset($_GET['id_congdan']) ? $_GET['id_congdan'] : '';
$id_kethon = isset($_GET['id_kethon']) ? $_GET['id_kethon'] : '';
$key = isset($_GET['key']) ? $_GET['key'] : 0;
$congdan->id = $id_congdan; $cd = $congdan->get_one();

if(isset($cd['kethon']) && $cd['kethon']){
	foreach ($cd['kethon'] as $kh) {
		if($kh['id_kethon'] == $id_kethon){
			$arr_kethon = array(
				'key' => $key,
				'id_kethon' => $kh['id_kethon'] ? $kh['id_kethon']->{'$id'} : '',
				'id_congdannuocngoai' => $kh['id_congdannuocngoai'] ? $kh['id_congdannuocngoai']->{'$id'} : '',
				'text' => $cd['hoten'] . ' [' . $cd['code'] . ']',
				'ngaykethon' => $kh['ngaykethon'] ? date("d/m/Y", $kh['ngaykethon']->sec) : ''
			);
		}
	}
	echo json_encode($arr_kethon);
}
