<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$diendidinhcu = new DienDiDinhCu();$congdan = new CongDan();
$diendidinhcu_list = $diendidinhcu->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : ''; 
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật';
}
if($id && $act=='del'){
	if($congdan->check_dm_diendicu($id)){
		$msg =  'Không thể xoá... [dicu].';
	} else {
		$diendidinhcu->id = $id;
		if($diendidinhcu->delete()){
			transfers_to('diendidinhcu.php?update=ok');
		} else {
			$msg = 'Không thể xoá';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tendiendidinhcu = isset($_POST['tendiendidinhcu']) ? $_POST['tendiendidinhcu'] : '';
	$diendidinhcu->ten = $tendiendidinhcu;

	if($id){
		$diendidinhcu->id = $id;
		if($diendidinhcu->edit()){
			transfers_to('diendidinhcu.php?update=ok');
		}
	} else {
		$diendidinhcu->id = new MongoId();
		if($diendidinhcu->check_exists()){
			$msg = 'Tên diện di cư/định cư tác đã tồn tại';
		} else {
			if($diendidinhcu->insert()){
				if($url) transfers_to($url);
				else transfers_to('diendidinhcu.php?update=ok');
			}
		}
	}
}

if($id){
	$diendidinhcu->id = $id;
	$edit = $diendidinhcu->get_one();
	$id = $edit['_id'];
	$tendiendidinhcu = $edit['ten'];
}	
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/html5.messages.js"></script>
<!--<script type="text/javascript" src="js/jquery.setcase.js"></script>-->
<script type="text/javascript">
	$(document).ready(function(){
		//$("input[type='text']").toCapitalize();
		<?php if(isset($msg) && $msg): ?>
			$.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
		<?php endif; ?>
	});
</script>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<div style="padding:5px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="diendidinhcuform">
	<a href="diendidinhcu.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tendiendidinhcu" id="tendiendidinhcu" value="<?php echo isset($tendiendidinhcu) ? $tendiendidinhcu : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên diện di cư/định cư" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>

<?php if($diendidinhcu_list && $diendidinhcu_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<!--<th>#</th>-->
		<th>Tên diện di cư/định cư</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
	<?php
	$i = 1;
	foreach($diendidinhcu_list as $dddc){
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		//echo '<td>'.$cqct['_id'].'</td>';
		echo '<td>'.$dddc['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN) {
			echo '<td><a href="diendidinhcu.php?id='.$dddc['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');"><span class="mif-bin"></span></a></td>';
			echo '<td><a href="diendidinhcu.php?id='.$dddc['_id'].'"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</tbody>
</table>
<?php endif; ?>

<?php require_once('footer.php'); ?>