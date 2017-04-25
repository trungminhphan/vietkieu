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
$id_laodong = isset($_GET['id_laodong']) ? $_GET['id_laodong'] : '';
$key = isset($_GET['key']) ? $_GET['key'] : 0;

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['laodong']) && $cd['laodong']){
	foreach ($cd['laodong'] as $ld) {
		if($ld['id_laodong'] == $id_laodong){
			$arr_laodong = array(
				'key' => $key,
				'id_laodong' => $ld['id_laodong'] ? $ld['id_laodong']->{'$id'} : '',
				'id_quocgia' => $ld['id_quocgia'] ? $ld['id_quocgia']->{'$id'} : '',
				'thoigianbatdau' => $ld['thoigianbatdau'] ? date("d/m/Y", $ld['thoigianbatdau']->sec) : '',
				'thoigianketthuc' => $ld['thoigianketthuc'] ? date("d/m/Y",$ld['thoigianketthuc']->sec) : '',
				'id_nganhnghe' => $ld['id_nganhnghe'] ? $ld['id_nganhnghe']->{'$id'} : '',
				'id_tinhtranglaodong' => $ld['id_tinhtranglaodong'] ? $ld['id_tinhtranglaodong']->{'$id'} : '',
				'coquanlaodong' => $ld['coquanlaodong'],
				'diachicoquanlaodong' => $ld['diachicoquanlaodong']
			);
		}
	}
	echo json_encode($arr_laodong);
}
