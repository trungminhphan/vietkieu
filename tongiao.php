<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$tongiao = new TonGiao(); $congdan = new CongDan();
$tongiao_list = $tongiao->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : ''; 

if($update=='ok'){ $msg = 'Cập nhật thành công.'; }
if($update=='no'){ $msg = 'Không thể cập nhật'; }
if($id && $act=='del'){
	$congdan->id_tongiao = $id;
	if($congdan->check_dm_tongiao($id)){
		$msg = 'Không thể xoá...';
	} else {
		$tongiao->id = $id;
		if($tongiao->delete()){
			transfers_to('tongiao.php?update=ok');
		} else {
			$msg = 'Không thể xoá.';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tentongiao = isset($_POST['tentongiao']) ? $_POST['tentongiao'] : '';
	$tongiao->ten = $tentongiao;
	if($id){
		//edit
		$tongiao->id = $id;
		if($tongiao->edit()){
			transfers_to('tongiao.php?update=ok');
		}
	} else {
		//insert
		$_id = new MongoId(); $tongiao->id = $_id;
		if($tongiao->check_exists()){
			$msg = 'Tên tôn giáo đã tồn tại.';
		} else {
			if($tongiao->insert()){
				if($url) transfers_to($url);
				else transfers_to('tongiao.php?update=ok');
			}
		}
	}
}

if($id){
	$tongiao->id = $id;
	$edit = $tongiao->get_one();
	$id = $edit['_id'];
	$tentongiao = $edit['ten'];
}	
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/html5.messages.js"></script>
<script type="text/javascript" src="js/jquery.setcase.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("input[type='text']").toCapitalize();
		<?php if(isset($msg) && $msg): ?>
			$.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
		<?php endif; ?>
	});
</script>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Tôn giáo</h1>
<div class="padding5">
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="tongiaoform">
	<a href="tongiao.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tentongiao" id="tentongiao" value="<?php echo isset($tentongiao) ? $tentongiao : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên Tôn giáo" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if($tongiao_list && $tongiao_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<!--<th>#</th>-->
		<th>Tên Tôn giáo</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
	<?php
	$i = 1;
	foreach($tongiao_list as $tg){
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$tg['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td><a href="tongiao.php?id='.$tg['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');" title="Xoá"><span class="mif-bin"></span></a></td>';
			echo '<td><a href="tongiao.php?id='.$tg['_id'].'" title="Sủa"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>