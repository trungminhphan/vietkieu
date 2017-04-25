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
$id_trithuc = isset($_GET['id_trithuc']) ? $_GET['id_trithuc'] : '';

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['trithuc']) && $cd['trithuc']){
	foreach ($cd['trithuc'] as $th) {
		if($th['id_trithuc'] == $id_trithuc){
			$arr_trithuc = array(
				'id_trithuc' => $th['id_trithuc'] ? $th['id_trithuc']->{'$id'} : '',
				'id_nganhhoc' => $th['id_nganhhoc'] ? $th['id_nganhhoc']->{'$id'} : '',
				'thoigianbatdau' => $th['thoigianbatdau'] ? date("d/m/Y", $th['thoigianbatdau']->sec) : '',
				'thoigianketthuc' => $th['thoigianketthuc'] ? date("d/m/Y", $th['thoigianketthuc']->sec) : '',
				'noidunglamviec' => $th['noidunglamviec'] ? $th['noidunglamviec']: ''
			);
		}
	}
	echo json_encode($arr_trithuc);
}
?>
