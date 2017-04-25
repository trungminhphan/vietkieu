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
	'gioitinh' => 'Giới tính'
	);
$arr_gioitinh = array('Nam', 'Nữ', 'null' => 'Không xác định');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2({
			placeholder: "Chọn loại thống kê"
		});
	})
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Kết hôn</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkekethonform">
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
<h3 style="text-align:center;">Thống kê Kết hôn theo Quốc gia</h3>
<?php
$quocgia = new QuocGia();
$quocgia_list = $quocgia->get_all_list();

?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Quốc gia</th>
		<th>Thống kê người Nước ngoài</th>
		<th>Thống kê người An Giang</th>
	</tr>
</thead>
<tbody>
	<?php
	$query_angiang = array();
	array_push($query_angiang, array('$or' => array(array('noisinh.0' => new MongoId('5576ece4d89398ec07000029')), array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')),array('noicutruhiennay.0' => new MongoId('5576ece4d89398ec07000029')))));
	array_push($query_angiang, array('$or' => array(array('noisinh.1' => new MongoId('5576ecefd89398ec0700002a')), array('hokhauthuongtru.1' => new MongoId('5576ecefd89398ec0700002a')), array('noicutruhiennay.1' => new MongoId('5576ecefd89398ec0700002a')))));
	array_push($query_angiang, array('kethon' => array('$exists' => true)));
	if($quocgia_list){
		$i=1; $sum = 0; $sum_angiang = 0;
		foreach ($quocgia_list as $qg) {
			$arr_congdan_nuocngoai = array();
			$count = $congdan->count_kethon_to_quocgia($qg['_id']);
			$sum += $count;
			$congdan_list = $congdan->get_list_condition(array('quoctich' => new MongoId($qg['_id'])));
			if($congdan_list){
				foreach ($congdan_list as $cd) {
					array_push($arr_congdan_nuocngoai, new MongoId($cd['_id']));
				}
			}
			$query_angiang_1 = $query_angiang;
			array_push($query_angiang_1, array('kethon.0.id_congdannuocngoai' => array('$in' => $arr_congdan_nuocngoai)));

			//array_push($query_angiang, array('kethon.0.id_congdannuocngoai' => new MongoId('566fbf285c1e88c00e8844e2')));
			$query = array('$and' => $query_angiang_1);
			$get_angiang = $congdan->get_kethon_angiang($query);
			$count_angiang =$get_angiang->count(); 
			$sum_angiang += $count_angiang;
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$qg['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkekethon.php?id='.$qg['_id'].'&loaithongke=quocgia">'.$count.'</a></td>';
			echo '<td align="right"><a href="chitietthongkekethon.php?id='.$qg['_id'].'&loaithongke=quocgia_angiang">'.$count_angiang.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
<tr>
	<td colspan="2"><b>Tổng cộng</b></td>
	<td align="right"><b><?php echo format_number($sum); ?><b></td>
	<td align="right"><b><?php echo format_number($sum_angiang); ?><b></td>
</tr>
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
			$count = $congdan->count_kethon_to_nganhnghe($nn['_id']);
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$nn['ten'].'</td>';
			echo '<td align="right"><a href="chitietthongkekethon.php?id='.$nn['_id'].'&loaithongke=nganhnghe">'.$count.'</a></td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
<?php endif; ?>
<!----- Thong ke theo gioi tinh --------- -->
<?php if($loaithongke == 'gioitinh') : ?>
<table class="table hovered striped bordered border">
<thead>
	<tr>
		<th>STT</th>
		<th>Giới tính</th>
		<th>Thống kê</th>
	</tr>
</thead>
<tbody>
	<?php
	$i =1;$sum = 0;
	foreach ($arr_gioitinh as $key => $value) {
		$count = $congdan->count_kethon_to_gioitinh($value);
		$sum += $count;
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$value.'</td>';
		echo '<td align="right"><a href="chitietthongkekethon.php?id='.$value.'&loaithongke=gioitinh">'.$count.'</a></td>';
		echo '</tr>';
		$i++;
	}
	?>
	<tr>
		<td colspan="2"><b>Tổng cộng</b></td>
		<td align="right"><b><?php echo $sum; ?></b></td>
	</tr>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>
