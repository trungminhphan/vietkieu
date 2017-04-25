<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan();$doanhnghiep = new DoanhNghiep();

$id_doanhnhan = isset($_POST['id_doanhnhan']) ? $_POST['id_doanhnhan'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_doanhnghiep = isset($_POST['id_doanhnghiep']) ? $_POST['id_doanhnghiep'] : '';
$chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : '';

$donvitien = isset($_POST['donvitien']) ? $_POST['donvitien'] : '';
$sotien = isset($_POST['sotien']) ? $_POST['sotien'] : '';
$tygia = isset($_POST['tygia']) ? $_POST['tygia'] : '';
$VND = isset($_POST['VND']) ? $_POST['VND'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;
if($id_doanhnhan){
	$congdan->id_doanhnhan = $id_doanhnhan;
	$arr_doanhnhan = array(
					'doanhnhan.$.id_doanhnghiep' => $id_doanhnghiep ? new MongoId($id_doanhnghiep) : '',
					'doanhnhan.$.chucvu' => $chucvu,
					'doanhnhan.$.donvitien' => $donvitien ? $donvitien : '',
					'doanhnhan.$.sotien' => $sotien ? $sotien : '',
					'doanhnhan.$.tygia' => $tygia ? $tygia : '',
					'doanhnhan.$.VND' => $VND ? $VND : '',
				);
	$congdan->doanhnhan = $arr_doanhnhan;
	if($congdan->set_doanhnhan()){
		if($id_doanhnghiep) { $doanhnghiep->id = $id_doanhnghiep; $dn = $doanhnghiep->get_one(); }
		echo '<tr class="items '.$id_doanhnhan.'">';
	    echo '<td>'.(isset($dn['ten']) ? $dn['ten'] : '').'</td>';
	    echo '<td>'.$chucvu.'</td>';
	    echo '<td>'.($VND ? format_number($VND) : ''). '</td>';
	    echo '<td><a href="get.xoadanhnhan.php?id_congdan='.$id_congdan .'&id_doanhnhan='.$id_doanhnhan.'" class="xoadoanhnhan" onclick="return false;"><span class="mif-bin"></span></a></td>';
	    echo '<td><a href="get.suadanhnhan.php?id_congdan='.$id_congdan .'&id_doanhnhan='.$id_doanhnhan.'" class="suadoanhnhan" onclick="return false;"><span class="mif-pencil"></span></a></td>';
	    echo '</tr>';
	} else {
		echo 'Failed';
	}
} else {
	$id_doanhnhan = new MongoId();
	$arr_doanhnhan = array(
		'id_doanhnhan' => $id_doanhnhan ? new  MongoId($id_doanhnhan) : '',
		'id_doanhnghiep' => $id_doanhnghiep ? new MongoId($id_doanhnghiep) : '',
		'chucvu' => $chucvu,
		'donvitien' => $donvitien ? $donvitien : '',
		'sotien' => $sotien ? $sotien : '',
		'tygia' => $tygia ? $tygia : '',
		'VND' => $VND ? $VND : '',
		'date_post' => new MongoDate(),
		'id_user' => $id_user ? new MongoId($id_user) : ''
	);
	$congdan->doanhnhan = $arr_doanhnhan;
	if($congdan->push_doanhnhan()){
		if($id_doanhnghiep) { $doanhnghiep->id = $id_doanhnghiep; $dn = $doanhnghiep->get_one(); }
		echo '<tr class="items '.$id_doanhnhan.'">';
	    echo '<td>'.(isset($dn['ten']) ? $dn['ten'] : '').'</td>';
	    echo '<td>'.$chucvu.'</td>';
	    echo '<td>'.($VND ? format_number($VND) : ''). '</td>';
	    echo '<td><a href="get.xoadanhnhan.php?id_congdan='.$id_congdan .'&id_doanhnhan='.$id_doanhnhan.'" class="xoadoanhnhan" onclick="return false;"><span class="mif-bin"></span></a></td>';
	    echo '<td><a href="get.suadanhnhan.php?id_congdan='.$id_congdan .'&id_doanhnhan='.$id_doanhnhan.'" class="suadoanhnhan" onclick="return false;"><span class="mif-pencil"></span></a></td>';
	    echo '</tr>';
	} else {
		echo 'Failed';
	}
}

?>
