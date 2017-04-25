<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$doanhnghiep = new DoanhNghiep();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$doanhnghiep->id = $id; $dn = $doanhnghiep->get_one();
$logo = isset($dn['logo']) ? $dn['logo'] : '';
$ghichu = isset($dn['ghichu']) ? $dn['ghichu'] : '';
$linhvuckinhdoanh = isset($dn['linhvuckinhdoanh']) ? $dn['linhvuckinhdoanh'] : '';
$array = array(
		'id' => $id, 
		'tendoanhnghiep' => $dn['ten'],
		'diachi1' => $dn['diachi'][0],
		'diachi2' => $dn['diachi'][1],
		'diachi3' => $dn['diachi'][2],
		'diachi4' => $dn['diachi'][3],
		'diachi5' => $dn['diachi'][4],
		'diachi6' => $dn['diachi'][5],
		'sodkkd' => $dn['sodkkd'],
		'vondkkd' => $dn['vondkkd'],
		'ngaydkkd' => $dn['ngaydkkd'] ? date("d/m/Y", $dn['ngaydkkd']->sec) : '',
		'hinhthucdautu' => $dn['hinhthucdautu'],
		'tinhtranghoatdong' => $dn['tinhtranghoatdong'],
		'linhvuckinhdoanh' => $linhvuckinhdoanh,
		'ghichu' => $ghichu,
		'logo' => $logo
		);
echo json_encode($array);
?>