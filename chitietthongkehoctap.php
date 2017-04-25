<?php
require_once('header.php');
$congdan = new CongDan();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
if($loaithongke=='coquancongtac'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Cơ quan Công tác</h1>';
	$query = array('hoctap.id_coquancongtac' => new MongoId($id));
} else if($loaithongke=='nganhhoc'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Ngành học</h1>';
	$query = array('hoctap.id_nganhhoc' => new MongoId($id));
} else if($loaithongke=='quocgiaduhoc'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Quốc gia du học</h1>';
	$query = array('hoctap.id_quocgia' => new MongoId($id));
} else if($loaithongke=='hinhthucduhoc'){
	$title = '<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Hình thức du học</h1>';
	$query = array('hoctap.id_hinhthuchoctap' => new MongoId($id));
} else if($loaithongke=='bangcapseco'){
	$title = '<h2><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê Học tập theo Bằng cấp sẽ có sau khi tốt nghiệp</h2>';
	$query = array('hoctap.id_trinhdo' => new MongoId($id));
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