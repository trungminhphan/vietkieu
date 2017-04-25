<?php
require_once('header.php');
$congdan = new CongDan();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
if($loaithongke=='quocgia'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Di cư theo Quốc gia</h1>';
	$query = array('dicu.id_quocgia' => new MongoId($id));
} else if($loaithongke=='tongiao'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Di cư theo Tôn giáo</h1>';
	$query = array('$and' => array(array('id_tongiao' => new MongoId($id)), array('dicu.id_dicu' => array('$exists' => true))));
} else if($loaithongke=='diendicu'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Di cư theo Diện di cư</h1>';
	$query = array('dicu.id_diendicu' => new MongoId($id));
} else if($loaithongke=='namdicu'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Di cư theo Năm di cư</h1>';
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