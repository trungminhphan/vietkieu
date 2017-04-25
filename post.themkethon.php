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

$id_kethon = isset($_POST['id_kethon']) ? $_POST['id_kethon'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_congdannuocngoai = isset($_POST['id_congdannuocngoai']) ? $_POST['id_congdannuocngoai'] : '';
$ngaykethon = isset($_POST['ngaykethon']) ? $_POST['ngaykethon'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;
if($id_kethon){
	$congdan->id_kethon = $id_kethon;
	$arr_kethon = array('kethon.$.id_congdannuocngoai' => $id_congdannuocngoai ? new MongoId($id_congdannuocngoai) : '',
						'kethon.$.ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '');
	$congdan->kethon = $arr_kethon;
	if($congdan->set_kethon()){
		$congdan->id = $id_congdannuocngoai;
		$arr_kethon_nn = array('kethon.$.id_congdannuocngoai' => $id_congdan ? new MongoId($id_congdan) : '',
						'kethon.$.ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '');
		$congdan->kethon = $arr_kethon_nn;
		$congdan->set_kethon();
		$cdnn = $congdan->get_one();

		if($cdnn['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdnn['noicutruhiennay']); }
		echo '<tr class="items '.$id_kethon.'">';
        echo '<td><a href="congdan.php?id='.$cdnn['_id'].'">'.$cdnn['hoten'].'</a></td>';
        echo '<td>'.$cdnn['gioitinh'].'</td>';
        echo '<td>'.($cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) : '').'</td>';
        echo '<td>'.($cdnn['quoctich'] ? $quocgia->get_quoctich($cdnn['quoctich']) :'').'</td>';
        echo '<td>'.$noicutruhiennay.'</td>';
        echo '<td>'.$ngaykethon.'</td>';
        echo '<td><a href="get.xoakethon.php?id_congdan='.$id_congdan .'&id_kethon='.$id_kethon.'&id_congdannuocngoai='.$cdnn['_id'].'" class="xoakethon" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suakethon.php?id_congdan='.$id_congdan .'&id_kethon='.$id_kethon.'" class="suakethon" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
	} else {
		echo 'Failed';
	}
} else {
	if($id_congdan && $id_congdannuocngoai){
		$id_kethon = new MongoId();
		$arr_kethon = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
						'id_congdannuocngoai' => $id_congdannuocngoai ? new MongoId($id_congdannuocngoai) : '',
						'ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '',
						'date_post' => new MongoDate(),
	                	'id_user' => $id_user ? new MongoId($id_user) : '');
		$congdan->kethon = $arr_kethon;
		if($congdan->push_kethon()){
			$congdan->id = $id_congdannuocngoai;
			$arr_kethon_nn = array('id_kethon' => $id_kethon ? new MongoId($id_kethon) : '',
				'id_congdannuocngoai' => $id_congdan ? new MongoId($id_congdan) : '',
				'ngaykethon' => $ngaykethon ? new MongoDate(convert_date_dd_mm_yyyy($ngaykethon)) : '',
				'date_post' => new MongoDate(),
	        	'id_user' => $id_user ? new MongoId($id_user) : '');
			$congdan->kethon = $arr_kethon_nn;
			$congdan->push_kethon();
			$cdnn = $congdan->get_one();

			if($cdnn['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdnn['noicutruhiennay']); }
			echo '<tr class="items '.$id_kethon.'">';
	        echo '<td><a href="congdan.php?id='.$cdnn['_id'].'">'.$cdnn['hoten'].'</a></td>';
	        echo '<td>'.$cdnn['gioitinh'].'</td>';
	        echo '<td>'.($cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) : '').'</td>';
	        echo '<td>'.($cdnn['quoctich'] ? $quocgia->get_quoctich($cdnn['quoctich']) :'').'</td>';
	        echo '<td>'.$noicutruhiennay.'</td>';
	        echo '<td>'.$ngaykethon.'</td>';
	        echo '<td><a href="get.xoakethon.php?id_congdan='.$id_congdan .'&id_kethon='.$id_kethon.'&id_congdannuocngoai='.$cdnn['_id'].'" class="xoakethon" onclick="return false;"><span class="mif-bin"></span></a></td>';
	        echo '<td><a href="get.suakethon.php?id_congdan='.$id_congdan .'&id_kethon='.$id_kethon.'" class="suakethon" onclick="return false;"><span class="mif-pencil"></span></a></td>';
	        echo '</tr>';	    
		} else {
			echo 'Failed';
		}
	} else {
		echo 'Failed';
	}
}


?>