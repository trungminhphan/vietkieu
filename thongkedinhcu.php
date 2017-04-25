<?php
require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$loaithongke='';
$congdan = new CongDan();
if(isset($_GET['submit'])){
	$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : '';
	$namnhaptich = isset($_GET['namnhaptich']) ? $_GET['namnhaptich'] : '';
}
$arr_thongke = array(
	'quocgia' => 'Quốc gia',
	'namnhaptich' => 'Năm di cư'
	);

?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Chọn loại thống kê"
		});
		if($("#loaithongke").val() == 'namnhaptich'){
			$(".namnhaptich").show();
		} else {
			$(".namnhaptich").hide();
		}
		$("#loaithongke").change(function(){
			if($(this).val() == 'namnhaptich'){
				$(".namnhaptich").show();
			} else {
				$(".namnhaptich").hide();
			}
		});
	})
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Định cư</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkedinhcuform">
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
<div class="input-control input namnhaptich">
	<input type="text" name="namnhaptich" id="namnhaptich" value="<?php echo isset($namnhaptich) ? $namnhaptich : ''; ?>" placeholder="Năm nhập tịch">
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>

<!---------------------  Quoc gia -------------------------->
<?php if($loaithongke=='quocgia') : ?>
<h3 style="text-align:center;">Thống kê Định cư theo Quốc gia</h3>
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
			$count = $congdan->count_dinhcu_to_quocgia($qg['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkedinhcu.php?id='.$qg['_id'].'&loaithongke=quocgia">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>

<!----- Nam nhap tich ------------- --> 
<?php if($loaithongke=='namnhaptich') : ?>
<?php
$count = $congdan->count_dinhcu_to_namnhaptich($namnhaptich);
?>
<h3 style="text-align:center;">Thống kê Di cư theo Năm nhập tịch</h3>
<h4 style="text-align:center;">Có tổng cộng <a href="chitietthongkedinhcu.php?id=<?php echo $namnhaptich; ?>&loaithongke=namnhaptich"><b><?php echo $count; ?></b></a> Định cư trong năm:<b> <?php echo $namnhaptich; ?></b></h4>

<?php endif; ?>
<?php require_once('footer.php'); ?>
