<?php require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$loaithongke='';
$congdan = new CongDan();
if(isset($_GET['submit'])){
	$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
}

$arr_thongke = array(
	'nganhhoc' => 'Ngành học',
	'coquancongtac' => 'Cơ quan công tác',
	'quocgiaduhoc' => 'Quốc gia du học',
	'hinhthucduhoc' => 'Hình thức du học',
	'bangcapseco' => 'Bằng cấp sẽ có'
	);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Chọn loại thống kê"
		});
	})
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Học tập</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkehoctapform">
<div class="input-control select">
	<select name="loaithongke" id="loaithongke" class="select2">
		<option value="">Chọn loại thống kê</option>
		<?php
		foreach ($arr_thongke as $key => $value) {
			echo '<option value="'.$key.'" '.($key == $loaithongke ? ' selected' : '').'>'.$value.'</option>';
		}
		?>
	</select>
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>
<!-------------------- Nganh hoc ---------------------->
<?php if($loaithongke=='nganhhoc') : ?>
<h3 style="text-align:center;">Thống kê Học tập theo Ngành học</h3>
<?php
$nganhhoc = new NganhHoc();
$nganhhoc_list = $nganhhoc->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Ngành học</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
<?php
if($nganhhoc_list){
	$i=1;
	foreach ($nganhhoc_list as $nh) {
		$count = $congdan->count_hoctap_to_nganhhoc($nh['_id']);
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$nh['ten'].'</td>';
		echo '<td align="right"><a href="chitietthongkehoctap.php?id='.$nh['_id'].'&loaithongke=nganhhoc">'.$count.'</a></td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Co quan cong tac -------------------------->
<?php if($loaithongke=='coquancongtac') : ?>
<h3 style="text-align:center;">Thống kê Học tập theo Cơ quan công tác</h3>
<?php
$coquancongtac = new CoQuanCongTac();
$coquancongtac_list = $coquancongtac->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Cơ quan</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($coquancongtac_list){
		$i=1;
		foreach ($coquancongtac_list as $cqct) {
			$count = $congdan->count_hoctap_to_coquancongtac($cqct['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$cqct['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkehoctap.php?id='.$cqct['_id'].'&loaithongke=coquancongtac">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Quoc gia du học -------------------------->
<?php if($loaithongke=='quocgiaduhoc') : ?>
<h3 style="text-align:center;">Thống kê Học tập theo Quốc gia du học</h3>
<?php
$quocgia = new QuocGia();
$quocgia_list = $quocgia->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Quốc gia du học</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($quocgia_list){
		$i=1;
		foreach ($quocgia_list as $qg) {
			$count = $congdan->count_hoctap_to_quocgiaduhoc($qg['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkehoctap.php?id='.$qg['_id'].'&loaithongke=quocgiaduhoc">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Hình thức học tập -------------------------->
<?php if($loaithongke=='hinhthucduhoc') : ?>
<h3 style="text-align:center;">Thống kê Học tập theo Hình thức du học</h3>
<?php
$hinhthuchoctap = new HinhThucHocTap();
$hinhthuchoctap_list = $hinhthuchoctap->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Hình thức du học</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($hinhthuchoctap_list){
		$i=1;
		foreach ($hinhthuchoctap_list as $htht) {
			$count = $congdan->count_hoctap_to_hinhthuchoctap($htht['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$htht['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkehoctap.php?id='.$htht['_id'].'&loaithongke=hinhthucduhoc">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Bang cap se co -------------------------->
<?php if($loaithongke=='bangcapseco') : ?>
<h3 style="text-align:center;">Thống kê Học tập theo Bằng cấp sẽ có sau khi tốt nghiệp</h3>
<?php
$trinhdo = new TrinhDo();
$trinhdo_list = $trinhdo->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Bằng cấp sẽ có</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($trinhdo_list){
		$i=1;
		foreach ($trinhdo_list as $td) {
			$count = $congdan->count_hoctap_to_bangcapseco($td['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$td['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkehoctap.php?id='.$td['_id'].'&loaithongke=bangcapseco">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>
