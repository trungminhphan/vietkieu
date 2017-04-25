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
$id_doanhnhan = isset($_GET['id_doanhnhan']) ? $_GET['id_doanhnhan'] : '';

$congdan->id = $id_congdan; $cd = $congdan->get_one();
if(isset($cd['doanhnhan']) && $cd['doanhnhan']){
	foreach ($cd['doanhnhan'] as $dn) {
		if($dn['id_doanhnhan'] == $id_doanhnhan){
			$arr_doanhnhan = array(
				'id_doanhnhan' => $dn['id_doanhnhan'] ? $dn['id_doanhnhan']->{'$id'} : '',
				'id_doanhnghiep' => $dn['id_doanhnghiep'] ? $dn['id_doanhnghiep']->{'$id'} : '',
				'chucvu' => $dn['chucvu'] ? $dn['chucvu'] : '',
				'donvitien' => $dn['donvitien'] ? $dn['donvitien'] : '',
				'sotien' => $dn['sotien'] ? $dn['sotien'] : '',
				'tygia' => $dn['tygia'] ? $dn['tygia'] : '',
				'VND' => $dn['VND'] ? $dn['VND'] : ''
			);
		}
	}
	echo json_encode($arr_doanhnhan);
}
?>
