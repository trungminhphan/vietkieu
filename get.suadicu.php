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
$id_dicu = isset($_GET['id_dicu']) ? $_GET['id_dicu'] : '';

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['dicu']) && $cd['dicu']){
	foreach ($cd['dicu'] as $dc) {
		if($dc['id_dicu'] == $id_dicu){
			$arr_dicu = array(
				'id_dicu' => $dc['id_dicu'] ? $dc['id_dicu']->{'$id'} : '',
				'id_quocgia' => $dc['id_quocgia'] ? $dc['id_quocgia']->{'$id'} : '',
				'ngaydicu' => $dc['ngaydicu'] ? date("d/m/Y", $dc['ngaydicu']->sec) : '',
				'id_diendicu' => $dc['id_diendicu'] ? $dc['id_diendicu']->{'$id'} : ''
			);
		}
	}
	echo json_encode($arr_dicu);
}
?>
