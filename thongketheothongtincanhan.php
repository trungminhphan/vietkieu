<?php
require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$congdan = new CongDan();
$quoctich = new QuocGia();$quoctich_list = $quoctich->get_all_list();
$nganhnghe = new NganhNghe(); $nganhnghe_list = $nganhnghe->get_all_list();
$tongiao = new TonGiao(); $tongiao_list = $tongiao->get_all_list();
$trinhdo = new TrinhDo(); $trinhdo_list = $trinhdo->get_all_list();
$arr_query = array();$id_quoctich='';$id_nganhnghe='';$id_tongiao='';$id_trinhdo='';
$arr_str = array();
if(isset($_GET['submit'])){
	$id_quoctich = isset($_GET['id_quoctich']) ? $_GET['id_quoctich'] : '';
	$id_nganhnghe = isset($_GET['id_nganhnghe']) ? $_GET['id_nganhnghe'] : '';
	$id_tongiao = isset($_GET['id_tongiao']) ? $_GET['id_tongiao'] : '';
	$id_trinhdo = isset($_GET['id_trinhdo']) ? $_GET['id_trinhdo'] : '';

	if($id_quoctich){
		array_push($arr_query, array('quoctich' => new MongoId($id_quoctich)));	
		array_push($arr_str, 'Quốc tịch');
	} 
	if($id_nganhnghe){
		array_push($arr_query, array('id_nganhnghe' => new MongoId($id_nganhnghe)));
		array_push($arr_str, 'Nghề nghiệp');		
	} 
	if($id_tongiao){
		array_push($arr_query, array('id_tongiao' => new MongoId($id_tongiao)));
		array_push($arr_str, 'Tôn giáo');
	}
	if($id_trinhdo){
		array_push($arr_query, array('id_trinhdo' => new MongoId($id_trinhdo)));
		array_push($arr_str, 'Trình độ');
	}

	if(count($arr_query) > 0 ){
		$query = array('$and' => $arr_query);
		$congdan_list = $congdan->get_list_condition($query);
		$str = implode(" - ", $arr_str);
	} else {
		$str = '';
	}
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2();
	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Theo thông tin cá nhân</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkethongtincanhanform">
<div class="grid">
	<div class="row cells12">
		<div class="cell colspan2"></div>
		<div class="cell colspan2">Quốc tịch</div>
		<div class="cell colspan6 input-control select">
			<select name="id_quoctich" id="id_quoctich" class="select2">
				<option value="">Chọn quốc tịch</option>
				<?php
				if($quoctich_list){
					foreach ($quoctich_list as $qt) {
						echo '<option value="'.$qt['_id'].'"'.($qt['_id']==$id_quoctich ? ' selected' : '').'>'.$qt['ten'].'</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="cell colspan2"></div>
	</div>
	<div class="row cells12">
		<div class="cell colspan2"></div>
		<div class="cell colspan2">Nghề nghiệp</div>
		<div class="cell colspan6 input-control select">
			<select name="id_nganhnghe" id="id_nganhnghe" class="select2">
				<option value="">Chọn Nghề nghiệp</option>
				<?php
				if($nganhnghe_list){
					foreach ($nganhnghe_list as $nn) {
						echo '<option value="'.$nn['_id'].'"'.($nn['_id']==$id_nganhnghe ? ' selected' : '').'>'.$nn['ten'].'</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="cell colspan2"></div>
	</div>
	<div class="row cells12">
		<div class="cell colspan2"></div>
		<div class="cell colspan2">Tôn giáo</div>
		<div class="cell colspan6 input-control select">
			<select name="id_tongiao" id="id_tongiao" class="select2">
				<option value="">Chọn tôn giáo</option>
				<?php
				if($tongiao_list){
					foreach ($tongiao_list as $tg) {
						echo '<option value="'.$tg['_id'].'"'.($tg['_id']==$id_tongiao ? ' selected' : '').'>'.$tg['ten'].'</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="cell colspan2"></div>
	</div>
	<div class="row cells12">
		<div class="cell colspan2"></div>
		<div class="cell colspan2">Trình độ</div>
		<div class="cell colspan6 input-control select">
			<select name="id_trinhdo" id="id_trinhdo" class="select2">
				<option value="">Trình độ</option>
				<?php
				if($trinhdo_list){
					foreach ($trinhdo_list as $td) {
						echo '<option value="'.$td['_id'].'"'.($td['_id']==$id_trinhdo ? ' selected' : '').'>'.$td['ten'].'</option>';
					}
				}
				?>
			</select>
		</div>
		<div class="cell colspan2"></div>
	</div>
	<div class="row cells12">
		<div class="cell colspan12 align-center">
			<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
		</div>
	</div>
</div>
</form>
<?php if(isset($congdan_list) && $congdan_list) : ?>
<h3 style="text-align:center;">Có tổng cộng <b><?php echo $congdan_list->count(); ?></b> Công dân</h3>
<h4 class="align-center fg-red"><?php echo $str; ?></h4>
<table class="table striped hovered">
<thead>
	<tr>
		<th>STT</th>
		<th>Họ tên</th>
		<th>Ngày sinh</th>
		<th>Giới tính</th>
		<?php if($id_quoctich): ?>
			<th>Quốc tịch</th>
		<?php endif;?>
		<?php if($id_nganhnghe): ?>
			<th>Nghề nghiệp</th>
		<?php endif;?>
		<?php if($id_tongiao): ?>
			<th>Tôn giáo</th>
		<?php endif;?>
		<?php if($id_trinhdo): ?>
			<th>Trình độ</th>
		<?php endif;?>
	</tr>
</thead>
<tbody>
	<?php
	$i = 1;
	foreach ($congdan_list as $cd) {
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		if($id_quoctich){
			if($cd['quoctich']){
				foreach ($cd['quoctich'] as $key => $value) {
					echo '<td>';
					echo $quoctich->get_quoctich($cd['quoctich']);
					echo '</td>';
				}
			}
		}
		if($id_nganhnghe){
			$nganhnghe->id = $cd['id_nganhnghe']; $nn = $nganhnghe->get_one();
			echo '<td>'.$nn['ten'].'</td>';
		}
		if($id_tongiao){
			$tongiao->id = $cd['id_tongiao']; $tg = $tongiao->get_one();
			echo '<td>'.$tg['ten'].'</td>';
		}
		if($id_trinhdo){
			$trinhdo->id = $cd['id_trinhdo']; $td = $trinhdo->get_one();
			echo '<td>'.$td['ten'].'</td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>