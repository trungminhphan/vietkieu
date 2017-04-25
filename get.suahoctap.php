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
$id_hoctap = isset($_GET['id_hoctap']) ? $_GET['id_hoctap'] : '';

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['hoctap']) && $cd['hoctap']){
	foreach ($cd['hoctap'] as $ht) {
		if($ht['id_hoctap'] == $id_hoctap){
			$arr_hoctap = array(
				'id_hoctap' => $ht['id_hoctap'] ? $ht['id_hoctap']->{'$id'} : '',
				'id_quocgia' => $ht['id_quocgia'] ? $ht['id_quocgia']->{'$id'} : '',
				'thoigianbatdau' => $ht['thoigianbatdau'] ? date("d/m/Y", $ht['thoigianbatdau']->sec) : '',
				'thoigianketthuc' => $ht['thoigianketthuc'] ? date("d/m/Y", $ht['thoigianketthuc']->sec) : '',
				'id_nganhhoc' => $ht['id_nganhhoc'] ? $ht['id_nganhhoc']->{'$id'} : '',
				'id_hinhthuchoctap' => $ht['id_hinhthuchoctap'] ? $ht['id_hinhthuchoctap']->{'$id'} : '',
				'id_trinhdo' => $ht['id_trinhdo'] ? $ht['id_trinhdo']->{'$id'} : '',
				'id_coquancongtac' => $ht['id_coquancongtac'] ? $ht['id_coquancongtac']->{'$id'} : ''
			);
		}
	}
	echo json_encode($arr_hoctap);
}
?>
