<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$nganhnghe = new NganhNghe();$congdan = new CongDan();
$nganhnghe_list = $nganhnghe->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : ''; 
$update = isset($_GET['update']) ? $_GET['update'] : ''; 
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg ='Không thể cập nhật nhật';
}
if($id && $act=='del'){
	if($congdan->check_dm_nganhnghe($id)){
		$msg = 'Không thể xoá... [nganhnghe], [laodong]';
	} else {
		$nganhnghe->id = $id;
		if($nganhnghe->delete()){
			transfers_to('nganhnghe.php?update=ok');
		} else { $msg = 'Không thể xoá'; }
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tennganhnghe = isset($_POST['tennganhnghe']) ? $_POST['tennganhnghe'] : '';
	$nganhnghe->id = $id;
	$nganhnghe->ten = $tennganhnghe;
	if($id){
		//edit
		if($nganhnghe->edit()){
			transfers_to('nganhnghe.php?update=ok');
		}
	} else {
		//insert
		if($nganhnghe->check_exists()){
			$msg = 'Tên ngành nghề đã tồn tại.';
		} else {
			if($nganhnghe->insert()){
				if($url) transfers_to($url);
				else transfers_to('nganhnghe.php');
			}
		}
	}
}

if($id){
	$nganhnghe->id = $id;
	$edit = $nganhnghe->get_one();
	$id = $edit['_id'];
	$tennganhnghe = $edit['ten'];
}	
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/html5.messages.js"></script>
<script type="text/javascript" src="js/jquery.setcase.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("input[type='text']").toCapitalize();
		<?php if(isset($msg) && $msg): ?>
			$.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
		<?php endif; ?>
	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Ngành nghề</h1>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<div style="padding:5px;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="nganhngheform">
	<a href="quocgia.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tennganhnghe" id="tennganhnghe" value="<?php echo isset($tennganhnghe) ? $tennganhnghe : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên ngành nghề" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if($nganhnghe_list && $nganhnghe_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<!--<th>#</th>-->
		<th>Tên Ngành nghề</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
	<?php
	$i = 1;
	foreach($nganhnghe_list as $nn){
		echo '<tr">';
		echo '<td>'.$i.'</td>';
		//echo '<td>'.$nn['_id'].'</td>';
		echo '<td>'.$nn['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td><a href="nganhnghe.php?id='.$nn['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');"><span class="mif-bin"></span></a></td>';
			echo '<td><a href="nganhnghe.php?id='.$nn['_id'].'"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>