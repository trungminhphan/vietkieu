<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$nganhhoc = new NganhHoc();$congdan = new CongDan();
$nganhhoc_list = $nganhhoc->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : ''; 
if($update=='ok'){
	$msg = 'Cập nhật thành công.';
}
if($update=='no'){
	$msg = 'Không thể nhật.';
} 
if($id && $act=='del'){
	if($congdan->check_dm_nganhhoc($id)){
		$msg = 'Không thể xoá. [hoctap]';
	} else {
		$nganhhoc->id = $id;
		if($nganhhoc->delete()){
			transfers_to('nganhhoc.php?update=ok');
		} else {
			$msg = 'Không thể xoá';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tennganhhoc = isset($_POST['tennganhhoc']) ? $_POST['tennganhhoc'] : '';
	$nganhhoc->id = $id;
	$nganhhoc->ten = $tennganhhoc;
	if($id){
		//edit
		if($nganhhoc->edit()){
			transfers_to('nganhhoc.php?update=ok');
		}
	} else {
		//insert
		if($nganhhoc->check_exists()){
			$msg = 'Tên ngành nghề đã tồn tại.';
		} else {
			if($nganhhoc->insert()){
				if($url) transfers_to($url);
				else transfers_to('nganhhoc.php?update=ok');
			}
		}
	}
}
if($id){
	$nganhhoc->id = $id;
	$edit = $nganhhoc->get_one();
	$id = $edit['_id'];
	$tennganhhoc = $edit['ten'];
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
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Ngành học</h1>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<div style="padding:5px;">
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="nganhngheform">
	<a href="nganhhoc.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tennganhhoc" id="tennganhhoc" value="<?php echo isset($tennganhhoc) ? $tennganhhoc : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên ngành học" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if($nganhhoc_list && $nganhhoc_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<!--<th>#</th>-->
		<th>Tên Ngành học</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
	<?php
	$i = 1;
	foreach($nganhhoc_list as $nh){
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		//echo '<td>'.$nn['_id'].'</td>';
		echo '<td>'.$nh['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td align="center"><a href="nganhhoc.php?id='.$nh['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');"><span class="mif-bin"></span></a></td>';
			echo '<td align="center"><a href="nganhhoc.php?id='.$nh['_id'].'"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>