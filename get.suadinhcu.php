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
$id_dinhcu = isset($_GET['id_dinhcu']) ? $_GET['id_dinhcu'] : '';

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['dinhcu']) && $cd['dinhcu']){
	foreach ($cd['dinhcu'] as $dc) {
		if($dc['id_dinhcu'] == $id_dinhcu){
			$arr_dinhcu = array(
				'id_dinhcu' => $dc['id_dinhcu'] ? $dc['id_dinhcu']->{'$id'} : '',
				'id_quocgia' => $dc['id_quocgia'] ? $dc['id_quocgia']->{'$id'} : '',
				'ngaynhaptich' => $dc['ngaynhaptich'] ? date("d/m/Y", $dc['ngaynhaptich']->sec) : ''
			);
		}
	}
	echo json_encode($arr_dinhcu);
}
?>
