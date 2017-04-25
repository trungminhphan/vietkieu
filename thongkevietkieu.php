<?php require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$loaithongke='';$tunam=0;$dennam=0;$namdicu=0;
$congdan = new CongDan();
if(isset($_GET['submit'])){
	$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
	$tunam = isset($_GET['tunam']) ? $_GET['tunam'] : '';
	$dennam = isset($_GET['dennam']) ? $_GET['dennam'] : '';
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
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Việt kiều</h1>
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
	<input type="number" name="tunam" id="tunam" value="<?php echo isset($tunam) ? $tunam : ''; ?>" placeholder="Từ năm">
</div>
<div class="input-control input namdicu">
	<input type="number" name="dennam" id="dennam" value="<?php echo isset($dennam) ? $dennam : ''; ?>" placeholder="Đến năm">
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>
<!---------------------  Quoc gia -------------------------->
<?php if($loaithongke=='quocgia') : ?>
<h3 style="text-align:center;">Thống kê Việt kiều theo Quốc gia</h3>
<?php
//$quocgia = new QuocGia();
//$quocgia_list = $quocgia->get_list_condition(array('_id' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
$diachi = new DiaChi();
$quocgia_list = $diachi->get_all_list();
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
		$i=1; $sum=0;
		foreach ($quocgia_list as $qg) {
			$count = $congdan->count_vietkieu_quocgia($qg['_id']);
			$sum+=$count;
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['tendiachi'].'</td>';
			echo '<td align="right"><a href="chitietthongkevietkieu.php?id='.$qg['_id'].'&loaithongke=quocgia">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
<tr>
	<td colspan="2"><b>Tổng cộng</b></td>
	<td align="right"><b><?php echo format_number($sum); ?></b></td>
</tr>
</tbody>
</table>
<?php endif; ?>

<!---------------------  ton giáo -------------------------->
<?php if($loaithongke=='tongiao') : ?>
<h3 style="text-align:center;">Thống kê Việt kiều theo Tôn giáo</h3>
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
		$i=1;$sum=0;
		foreach ($tongiao_list as $tg) {
			$count = $congdan->count_vietkieu_to_tongiao($tg['_id']);
			$sum+=$count;
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$tg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkevietkieu.php?id='.$tg['_id'].'&loaithongke=tongiao">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
<tr>
	<?php
		$count = $congdan->count_vietkieu_to_tongiao('');
		$sum+=$count;
	?>
	<td align="left"><?php echo $i; ?></td>
	<td><b>Không xác định Tôn giáo</b></td>
	
	<td align="right"><a href="chitietthongkevietkieu.php?id=null&loaithongke=tongiao"><b><?php echo $count; ?></b></a></td>
</tr>
<tr>
	<td colspan="2"><b>Tổng cộng</b></td>
	<td align="right"><b><?php echo format_number($sum); ?></b></td>
</tr>
</tbody>
</table>
<?php endif; ?>

<!---------------------  Dien di dinh cu -------------------------->
<?php if($loaithongke=='diendicu') : ?>
<h3 style="text-align:center;">Thống kê Việt kiều theo Diện di cư</h3>
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
		$i=1;$sum=0;
		foreach ($diendicu_list as $ddc) {
			$count = $congdan->count_vietkieu_to_diendicu($ddc['_id']);
			$sum+=$count;
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$ddc['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkevietkieu.php?id='.$ddc['_id'].'&loaithongke=diendicu">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
<tr>
	<?php
		$count = $congdan->count_vietkieu_to_diendicu('');
		$sum+=$count;
	?>
	<td align="left"><?php echo $i; ?></td>
	<td><b>Không xác định diện di cư</b></td>
	
	<td align="right"><a href="chitietthongkevietkieu.php?id=null&loaithongke=diendicu"><b><?php echo $count; ?></b></a></td>
</tr>
<tr>
	<td colspan="2"><b>Tổng cộng</b></td>
	<td align="right"><b><?php echo format_number($sum); ?></b></td>
</tr>
</tbody>
</table>
<?php endif; ?>
<?php if($loaithongke=='namdicu') : ?>
<?php
if($dennam > $tunam){
	echo '<table class="table border bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>Năm</th>
			<th>Thống kê</th>
		</tr>
	</thead>';
	$i = 1;
	echo '<tbody>';
	for($namdicu=$tunam; $namdicu<=$dennam; $namdicu++){
		$count = $congdan->count_dicu_to_namdicu($namdicu);
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$namdicu.'</td>';
		echo '<td><a href="chitietthongkedicu.php?id='.$namdicu.'&loaithongke=namdicu">'.$count.'</a></td>';
		echo '</tr>';
		$i++;
	}
	echo '</tbody>';
	echo '</table>';
} else {
	echo '<h2>Chọn năm sai....</h2>';
}
?>
<?php endif; ?>
<?php require_once('footer.php'); ?>