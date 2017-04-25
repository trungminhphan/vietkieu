<?php
require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$congdan = new CongDan();$quocgia = new QuocGia();
$arr = array('vietkieu' => 'Việt Kiều', 'hoctap' => 'Học tập','laodong' => 'Lao động','kethon' => 'Kết hôn','dicu' => 'Di cư',
	'trithuc' => 'Trí thức','doanhnhan' => 'Doanh nhân');
$arr_query = array(); $arr_quoctich = array();$arr_str = array();
if(isset($_GET['submit'])){
	foreach ($arr as $key => $value) {
		$$key = isset($_GET[$key]) ? $_GET[$key] : '';
		if($$key){
			if($key == 'vietkieu' && $$key == 1){
				/*$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
				if($quocgia_list){
					foreach ($quocgia_list as $qg) {
						array_push($arr_quoctich, $qg['_id']);
					}
				}*/
				//ID dia chi An Giang - Viet Nam 5576ecefd89398ec0700002a - 5576ece4d89398ec07000029
				//$q_diachi = array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a'))));
				//array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
				array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
				array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
				array_push($arr_query, array('noicutruhiennay.0' => array('$ne' => new MongoId('5576ece4d89398ec07000029'))));
				array_push($arr_query, array('noicutruhiennay.0' => array('$exists' => true)));
				array_push($arr_query, array('kethon.id_kethon' => array('$exists' => false)));
			} else if($key == 'kethon' && $$key == 1){
				//$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
				//if($quocgia_list){
				//	foreach ($quocgia_list as $qg) {
				//		array_push($arr_quoctich, $qg['_id']);
				//	}
				//}
				//array_push($arr_query, array('quoctich' => array('$in' => $arr_quoctich)));
				array_push($arr_query, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')))));
				//array_push($arr_query, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')))));
				array_push($arr_query, array($key . '.id_'. $key => array('$exists' => true)));
			} else {
				array_push($arr_query, array($key . '.id_'. $key => array('$exists' => true)));
			}
			array_push($arr_str, $value);
		}
	}
	if(count($arr_query) > 0 ) $query = array('$and' => $arr_query);
	else $query = array('_id' => true);
	$congdan_list = $congdan->get_list_condition($query);
	$str = implode(" - ", $arr_str);
}

?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Phân loại</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkephanloaiform">
<div class="input-control checkbox">
<?php
foreach ($arr as $key => $value) {
	echo '<label class="input-control checkbox">
		    <input type="checkbox" name="'.$key.'" value="1" '.((isset($$key) && $$key) ? ' checked' : '').'>
		    <span class="check"></span>
		    <span class="caption">'.$value.'&nbsp;&nbsp;&nbsp;</span>
		</label>';
}
?>
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>
<hr />
<?php if(isset($congdan_list) && $congdan_list) : ?>
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<h3 style="text-align:center;">Có tổng cộng <b><?php echo format_number($congdan_list->count()); ?></b> Công dân</h3>
<h4 class="align-center fg-red"><?php echo $str; ?></h4>
<table class="datatable table striped hovered" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<th class="sortable-column sort-desc">ID</th>
		<th class="sortable-column sort-asc">Họ tên</th>
		<th>Ngày sinh</th>
		<th class="sortable-column sort-asc">Quốc tịch</th>
		<th>Giới tính</th>
	</tr>
</thead>
<tbody>
	<?php
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
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>