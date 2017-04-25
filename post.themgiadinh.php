<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }
$congdan = new CongDan(); $quocgia = new QuocGia();$diachi=new DiaChi();

$id_giadinh = isset($_POST['id_giadinh']) ? $_POST['id_giadinh'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_congdanquanhe = isset($_POST['id_congdanquanhe']) ? $_POST['id_congdanquanhe'] : '';
$quanhegiadinh1 = isset($_POST['quanhegiadinh1']) ? $_POST['quanhegiadinh1'] : '';
$quanhegiadinh2 = isset($_POST['quanhegiadinh2']) ? $_POST['quanhegiadinh2'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;

if($id_giadinh){
	$congdan->id_giadinh = $id_giadinh;
	$arr_giadinh = array('giadinh.$.id_congdanquanhe' => $id_congdanquanhe ? new MongoId($id_congdanquanhe) : '',
						'giadinh.$.quanhegiadinh1' => $quanhegiadinh1, 'giadinh.$.quanhegiadinh2' => $quanhegiadinh2);
	$congdan->giadinh = $arr_giadinh;
	if($congdan->set_giadinh()){
		$congdan->id = $id_congdanquanhe;
		$arr_giadinh_nn = array('giadinh.$.id_congdanquanhe' => $id_congdan ? new MongoId($id_congdan) : '',
						'giadinh.$.quanhegiadinh1' => $quanhegiadinh2, 'giadinh.$.quanhegiadinh2' => $quanhegiadinh1);
		$congdan->giadinh = $arr_giadinh_nn;
		$congdan->set_giadinh();
		$cdnn = $congdan->get_one();

		if($cdnn['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdnn['noicutruhiennay']); }
		echo '<tr class="items '.$id_giadinh.'">';
        echo '<td><a href="congdan.php?id='.$cdnn['_id'].'">'.$cdnn['hoten'].'</a></td>';
        echo '<td>'.$cdnn['gioitinh'].'</td>';
        echo '<td>'.($cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) : '').'</td>';
        echo '<td>'.($cdnn['quoctich'] ? $quocgia->get_quoctich($cdnn['quoctich']) :'').'</td>';
        echo '<td>'.$noicutruhiennay.'</td>';
        echo '<td>'.$quanhegiadinh1.'</td>';
        echo '<td><a href="get.xoagiadinh.php?id_congdan='.$id_congdan .'&id_giadinh='.$id_giadinh.'&id_congdannuocngoai='.$cdnn['_id'].'" class="xoagiadinh" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suagiadinh.php?id_congdan='.$id_congdan .'&id_giadinh='.$id_giadinh.'" class="suagiadinh" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
	} else {
		echo 'Failed';
	}
} else {
	$id_giadinh = new MongoId();
	$arr_giadinh = array('id_giadinh' => $id_giadinh ? new MongoId($id_giadinh) : '',
					'id_congdanquanhe' => $id_congdanquanhe ? new MongoId($id_congdanquanhe) : '',
					'quanhegiadinh1' => trim($quanhegiadinh1),'quanhegiadinh2' => trim($quanhegiadinh2),
					'date_post' => new MongoDate(),
                	'id_user' => $id_user ? new MongoId($id_user) : '');
	$congdan->giadinh = $arr_giadinh;
	if($congdan->push_giadinh()){
		$congdan->id = $id_congdanquanhe;
		$arr_giadinh_nn = array('id_giadinh' => $id_giadinh ? new MongoId($id_giadinh) : '',
			'id_congdanquanhe' => $id_congdan ? new MongoId($id_congdan) : '',
			'quanhegiadinh1' => trim($quanhegiadinh2),'quanhegiadinh2' => trim($quanhegiadinh1),
			'date_post' => new MongoDate(),
        	'id_user' => $id_user ? new MongoId($id_user) : '');
		$congdan->giadinh = $arr_giadinh_nn; $congdan->push_giadinh();

		$cdqh = $congdan->get_one();
		if($cdqh['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdqh['noicutruhiennay']); }
		echo '<tr class="items '.$id_giadinh.'">';
        echo '<td><a href="congdan.php?id='.$cdqh['_id'].'">'.$cdqh['hoten'].'</a></td>';
        echo '<td>'.$cdqh['gioitinh'].'</td>';
        echo '<td>'.($cdqh['ngaysinh'] ? date("d/m/Y",$cdqh['ngaysinh']->sec) : '').'</td>';
        echo '<td>'.($cdqh['quoctich'] ? $quocgia->get_quoctich($cdqh['quoctich']) :'').'</td>';
        echo '<td>'.$noicutruhiennay.'</td>';
        echo '<td>'.$quanhegiadinh1.'</td>';
        echo '<td><a href="get.xoagiadinh.php?id_congdan='.$id_congdan .'&id_giadinh='.$id_giadinh.'&id_congdanquanhe='.$cdqh['_id'].'" class="xoagiadinh" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suagiadinh.php?id_congdan='.$id_congdan .'&id_giadinh='.$id_giadinh.'" class="suagiadinh" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
	} else {
		echo 'Failed';
	}
}


?>