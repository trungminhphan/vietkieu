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
	$namdicu = isset($_GET['namdicu']) ? $_GET['namdicu'] : '';
}
$arr_thongke = array(
	'quocgia' => 'Quốc gia',
	'tongiao' => 'Tôn giáo',
	'diendicu' => 'Diện di cư',
	'namdicu' => 'Năm di cư'
	);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Chọn loại thống kê"
		});
		if($("#loaithongke").val() == 'namdicu'){
			$(".namdicu").show();
		} else {
			$(".namdicu").hide();
		}
		$("#loaithongke").change(function(){
			if($(this).val() == 'namdicu'){
				$(".namdicu").show();
			} else {
				$(".namdicu").hide();
			}
		});
	})
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Di cư</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkedicuform">
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
<div class="input-control input namdicu">
	<input type="text" name="namdicu" id="namdicu" value="<?php echo isset($namdicu) ? $namdicu : ''; ?>" placeholder="Năm di cư">
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>
<!---------------------  Quoc gia -------------------------->
<?php if($loaithongke=='quocgia') : ?>
<h3 style="text-align:center;">Thống kê Di cư theo Quốc gia</h3>
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
			$count = $congdan->count_dicu_to_quocgia($qg['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkedicu.php?id='.$qg['_id'].'&loaithongke=quocgia">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  ton giáo -------------------------->
<?php if($loaithongke=='tongiao') : ?>
<h3 style="text-align:center;">Thống kê Di cư theo Tôn giáo</h3>
<?php
$tongiao = new TonGiao();
$tongiao_list = $tongiao->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Tôn giáo</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($tongiao_list){
		$i=1;
		foreach ($tongiao_list as $tg) {
			$count = $congdan->count_dicu_to_tongiao($tg['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$tg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkedicu.php?id='.$tg['_id'].'&loaithongke=tongiao">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Dien di dinh cu -------------------------->
<?php if($loaithongke=='diendicu') : ?>
<h3 style="text-align:center;">Thống kê Di cư theo Diện di cư</h3>
<?php
$diendicu = new DienDiDinhCu();
$diendicu_list = $diendicu->get_all_list();
?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Diện di định cư</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	if($diendicu_list){
		$i=1;
		foreach ($diendicu_list as $ddc) {
			$count = $congdan->count_dicu_to_diendicu($ddc['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$ddc['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkedicu.php?id='.$ddc['_id'].'&loaithongke=diendicu">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php if($loaithongke=='namdicu') : ?>
<?php
$count = $congdan->count_dicu_to_namdicu($namdicu);
?>
<h3 style="text-align:center;">Thống kê Di cư theo Năm di cư</h3>
<h4 style="text-align:center;">Có tổng cộng <a href="chitietthongkedicu.php?id=<?php echo $namdicu; ?>&loaithongke=namdicu"><b><?php echo $count; ?></b></a> Di cư trong năm:<b> <?php echo $namdicu; ?></b></h4>

<?php endif; ?>
<?php require_once('footer.php'); ?>