<?php
require_once('header.php');
$congdan = new CongDan();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
if($loaithongke=='quocgia'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Kết hôn theo Quốc gia</h1>';
	//$query = array('$and' => array(array('quoctich' => new MongoId($id));
	$query = array('$and' => array(array('quoctich' => new MongoId($id)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => array('$ne' => new MongoId('543b14b65c1e8824048b456a')))));
} else if($loaithongke == 'quocgia_angiang'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Kết hôn theo Người ở An Giang</h1>';
	$query_angiang = array(); $arr_congdan_nuocngoai = array();
	array_push($query_angiang, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')),array('noicutruhiennay.0' => new MongoId('5576ece4d89398ec07000029')))));
	array_push($query_angiang, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')), array('noicutruhiennay.1' => new MongoId('5576ecefd89398ec0700002a')))));
	array_push($query_angiang, array('kethon' => array('$exists' => true)));
	$congdan_list = $congdan->get_list_condition(array('quoctich' => new MongoId($id)));
	if($congdan_list){
		foreach ($congdan_list as $cd) {
			array_push($arr_congdan_nuocngoai, new MongoId($cd['_id']));
		}
	}
	array_push($query_angiang, array('kethon.0.id_congdannuocngoai' => array('$in' => $arr_congdan_nuocngoai)));
	$query = array('$and' => $query_angiang);

} else if($loaithongke=='nganhnghe'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Kết hôn theo Ngành nghề</h1>';
	//$query = array('id_nganhnghe' => new MongoId($id));
	//$query = array('$and' => array(array('id_nganhnghe' => new MongoId($id)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => array('$ne' => new MongoId('543b14b65c1e8824048b456a')))));
	$query = array('$and' => array(array('id_nganhnghe' => new MongoId($id)), array('kethon.id_kethon' => array('$exists' => true)), array('quoctich' => new MongoId('543b14b65c1e8824048b456a'))));
} else if($loaithongke=='gioitinh'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Kết hôn theo Giới tính - <b>'.$id.'</b></h1>';
	if($id == 'Không xác định'){
		$query = array('$and' => array(array('gioitinh' => array('$nin' => array('Nam', 'Nữ'))), array('kethon.id_kethon' => array('$exists' => true)),array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029'))))));
	} else {
		$query = array('$and' => array(array('gioitinh' => $id), array('kethon.id_kethon' => array('$exists' => true)),array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029'))))));
	}
	//$query = array('$and' => array(array('gioitinh' => $id), array('kethon.id_kethon' => array('$exists' => true)),array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029'))))));
} else {
	$title = '';
}

$congdan_list = $congdan->get_list_condition($query);
echo $title;
?>
<table class="table striped hovered">
<thead>
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Ngày sinh</th>
		<th>Giới tính</th>
	</tr>
</thead>
<tbody>
	<?php
	if($congdan_list){
		$i = 1;
		foreach ($congdan_list as $cd) {
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
			echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '').'</td>';
			echo '<td>'.$cd['gioitinh'].'</td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php require_once('footer.php'); ?>