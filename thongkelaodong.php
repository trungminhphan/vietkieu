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
	'quocgia' => 'Quốc gia',
	'nganhnghe' => 'Ngành nghề',
	'trinhdo' => 'Trình độ',
	'tinhtranglaodong' => 'Tình trạng lao động'
	);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Chọn loại thống kê"
		});
	})
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Lao động</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkelaodongform">
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

<!---------------------  Quoc gia -------------------------->
<?php if($loaithongke=='quocgia') : ?>
<h3 style="text-align:center;">Thống kê Lao động theo Quốc gia</h3>
<?php
$quocgia = new QuocGia();
$quocgia_list = $quocgia->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Quốc gia</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($quocgia_list){
		$i=1;
		foreach ($quocgia_list as $qg) {
			$count = $congdan->count_laodong_to_quocgia($qg['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkelaodong.php?id='.$qg['_id'].'&loaithongke=quocgia">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Nganh nghe -------------------------->
<?php if($loaithongke=='nganhnghe') : ?>
<h3 style="text-align:center;">Thống kê Lao động theo Ngành nghề</h3>
<?php
$nganhnghe = new NganhNghe();
$nganhnghe_list = $nganhnghe->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Ngành nghề</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($nganhnghe_list){
		$i=1;
		foreach ($nganhnghe_list as $nn) {
			$count = $congdan->count_laodong_to_nganhnghe($nn['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$nn['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkelaodong.php?id='.$nn['_id'].'&loaithongke=nganhnghe">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  trinh do -------------------------->
<?php if($loaithongke=='trinhdo') : ?>
<h3 style="text-align:center;">Thống kê Lao động theo Trình độ</h3>
<?php
$trinhdo = new TrinhDo();
$trinhdo_list = $trinhdo->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Trình độ</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($trinhdo_list){
		$i=1;
		foreach ($trinhdo_list as $td) {
			$count = $congdan->count_laodong_to_trinhdo($td['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$td['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkelaodong.php?id='.$td['_id'].'&loaithongke=trinhdo">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  trinh do -------------------------->
<?php if($loaithongke=='tinhtranglaodong') : ?>
<h3 style="text-align:center;">Thống kê Lao động theo Tình trạng lao động</h3>
<?php
$tinhtranglaodong = new TinhTrangLaoDong();
$tinhtranglaodong_list = $tinhtranglaodong->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Tình trạng lao động</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($tinhtranglaodong_list){
		$i=1;
		foreach ($tinhtranglaodong_list as $tt) {
			$count = $congdan->count_laodong_to_tinhtranglaodong($tt['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$tt['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkelaodong.php?id='.$tt['_id'].'&loaithongke=tinhtranglaodong">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>
