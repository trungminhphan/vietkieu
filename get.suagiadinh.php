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
$id_giadinh = isset($_GET['id_giadinh']) ? $_GET['id_giadinh'] : '';
$key = isset($_GET['key']) ? $_GET['key'] : 0;
$congdan->id = $id_congdan; $cd = $congdan->get_one();

if(isset($cd['giadinh']) && $cd['giadinh']){
	foreach ($cd['giadinh'] as $gd) {
		if($gd['id_giadinh'] == $id_giadinh){
			$congdan->id = $gd['id_congdanquanhe']; $cdqh = $congdan->get_one();
			$arr_giadinh = array(
				'key' => $key,
				'id_giadinh' => $gd['id_giadinh'] ? $gd['id_giadinh']->{'$id'} : '',
				'id_congdanquanhe' => $gd['id_congdanquanhe'] ? $gd['id_congdanquanhe']->{'$id'} : '',
				'text' => $cdqh['hoten'] . ' [' . $cdqh['code'] . ']',
				'quanhegiadinh1' => $gd['quanhegiadinh1'],
				'quanhegiadinh2' => $gd['quanhegiadinh2']
			);
		}
	}
	echo json_encode($arr_giadinh);
}
