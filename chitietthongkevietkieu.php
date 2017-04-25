<?php
require_once('header.php');
$congdan = new CongDan();$quocgia = new QuocGia();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
if($loaithongke=='quocgia'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Việt kiều theo Quốc gia</h1>';
	$arr_query = array();$query='';
	array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
	array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
	array_push($arr_query, array('noicutruhiennay.0' => new MongoId($id)));
	array_push($arr_query, array('noicutruhiennay.0' => array('$exists' => true)));
	array_push($arr_query, array('kethon.id_kethon' => array('$exists' => false)));
	if(count($arr_query) > 0 ) $query = array('$and' => $arr_query);
} else if($loaithongke=='tongiao'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Việt kiều theo Tôn giáo</h1>';
	$quocgia=new QuocGia();$arr_quoctich = array();$arr_query = array();
	$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
	if($quocgia_list){
		foreach ($quocgia_list as $qg) {
			array_push($arr_quoctich, $qg['_id']);
		}
	}
	array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
	array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
	array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
	if($id=='null'){
		array_push($arr_query, array('$or' => array(array('id_tongiao' => ''), array('id_tongiao'=>array('$exists' => false)))));
	} else {
		array_push($arr_query, array('id_tongiao' => new MongoId($id)));
	}
	$query = array('$and' => $arr_query);
} else if($loaithongke=='diendicu'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Việt kiều theo Diện di cư</h1>';
	$quocgia=new QuocGia();$arr_quoctich = array();$arr_query = array();
	$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
	if($quocgia_list){
		foreach ($quocgia_list as $qg) {
			array_push($arr_quoctich, $qg['_id']);
		}
	}
	array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
	array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
	array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
	if($id=='null'){
		array_push($arr_query, array('$or' => array(array('dicu.id_diendicu' => ''), array('dicu.id_diendicu'=>array('$exists' => false)))));
	} else {
		array_push($arr_query, array('dicu.id_diendicu' => new MongoId($id)));
	}
	$query = array('$and' => $arr_query);
} else if($loaithongke=='namdicu'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Việt kiều theo Năm di cư</h1>';
	$date1 = new MongoDate(strtotime($id . '-01-01 00:00:00'));
	$date2 = new MongoDate(strtotime($id . '-12-31 23:00:00'));
	$query = array('$and' => array(array('dicu.ngaydicu' => array('$gte' => $date1)), array('dicu.ngaydicu' => array('$lte' => $date2))));
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
		<th>ID</th>
		<th>Họ tên</th>
		<th>Ngày sinh</th>
		<th>Quốc tịch</th>
		<th>Giới tính</th>
	</tr>
</thead>
<tbody>
	<?php
	if($congdan_list){
		$i = 1;
		foreach ($congdan_list as $cd) {
			if(isset($cd['quoctich']) && $cd['quoctich']){
				$quoctich = $quocgia->get_quoctich($cd['quoctich']);
			} else { $quoctich = ''; }
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$cd['code'].'</td>';
			echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
			echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '').'</td>';
			echo '<td>'.$quoctich.'</td>';
			echo '<td>'.$cd['gioitinh'].'</td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php require_once('footer.php'); ?>