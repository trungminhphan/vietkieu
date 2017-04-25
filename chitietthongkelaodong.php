<?php
require_once('header.php');
$congdan = new CongDan();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
if($loaithongke=='quocgia'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Lao động theo Quốc gia</h1>';
	$query = array('laodong.id_quocgia' => new MongoId($id));
} else if($loaithongke=='nganhnghe'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Lao động theo Ngành nghề</h1>';
	$query = array('laodong.id_nganhnghe' => new MongoId($id));
} else if($loaithongke=='trinhdo'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê lao động theo Trình độ</h1>';
	$query = array('$and' => array(array('id_trinhdo' => new MongoId($id)), array('laodong.id_laodong'=> array('$exists' => true)) ));
} else if($loaithongke=='tinhtranglaodong'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Hình thức du học</h1>';
	$query = array('laodong.id_tinhtranglaodong' => new MongoId($id));
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