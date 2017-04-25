<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$trinhdo = new TrinhDo(); $congdan = new CongDan();
$trinhdo_list = $trinhdo->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : ''; 
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật';
}
if($id && $act=='del'){
	if($congdan->check_dm_trinhdo($id)){
		$msg = 'Không thể xoá...[trinhdo], [hoctap]';
	} else {
		$trinhdo->id = $id;
		if($trinhdo->delete()){
			transfers_to('trinhdo.php?update=ok');
		} else {
			$msg = 'Không thể xoá.';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tentrinhdo = isset($_POST['tentrinhdo']) ? $_POST['tentrinhdo'] : '';
	$trinhdo->id = $id;
	$trinhdo->ten = $tentrinhdo;
	if($id){
		//edit
		if($trinhdo->edit()){
			transfers_to('trinhdo.php');
		}
	} else {
		//insert
		if($trinhdo->check_exists()){
			$msg = 'Tên trình độ đã tồn tại.';
		} else {
			if($trinhdo->insert()){
				if($url) transfers_to($url);
				else transfers_to('trinhdo.php');
			}
		}
	}
}

if($id){
	$trinhdo->id = $id;
	$edit = $trinhdo->get_one();
	$id = $edit['_id'];
	$tentrinhdo = $edit['ten'];
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
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Trình độ</h1>
<div style="padding:5px;">
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="trinhdoform">
	<a href="trinhdo.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tentrinhdo" id="tentrinhdo" value="<?php echo isset($tentrinhdo) ? $tentrinhdo : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên trình độ" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if($trinhdo_list && $trinhdo_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<th>Tên Trình độ học tập</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
	<?php
	$i = 1;
	foreach($trinhdo_list as $qg){
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$qg['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td><a href="trinhdo.php?id='.$qg['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');" title="Xoá"><span class="mif-bin"></span></a></td>';
			echo '<td><a href="trinhdo.php?id='.$qg['_id'].'" title="Sửa"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>