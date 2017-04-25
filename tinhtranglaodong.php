<?php
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}

$tinhtranglaodong = new TinhTrangLaoDong();$congdan = new CongDan();
$list = $tinhtranglaodong->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$ten = isset($_GET['ten']) ? $_GET['ten'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : '';
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật.';
}
if($id && $act=='del'){
	if($congdan->check_dm_tinhtranglaodong($id)){
		$msg = 'Không thể xoá [laodong]';
	} else {
		$tinhtranglaodong->id = $id;
		if($tinhtranglaodong->delete()){
			transfers_to('tinhtranglaodong.php?update=ok');
		} else {
			$msg = 'Không thể xoá.';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tentinhtranglaodong = isset($_POST['tentinhtranglaodong']) ? $_POST['tentinhtranglaodong'] : '';
	$tinhtranglaodong->ten = $tentinhtranglaodong;
	if($id){
		//edit
		$tinhtranglaodong->id = $id;
		if($tinhtranglaodong->edit()){
			transfers_to('tinhtranglaodong.php?update=ok');
		}
	} else {
		//insert
		if($tinhtranglaodong->check_exists()){
			$msg = 'Tên tôn giáo đã tồn tại.';
		} else {
			if($tinhtranglaodong->insert()){
				if($url) transfers_to($url);
				else transfers_to('tinhtranglaodong.php?update=ok');
			}
		}
	}
}

if($id){
	$tinhtranglaodong->id = $id;
	$edit = $tinhtranglaodong->get_one();
	$id = $edit['_id'];
	$tentinhtranglaodong = $edit['ten'];
}
?>
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
<div style="padding:5px;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="tongiaoform">
<a href="tinhtranglaodong.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
<div class="input-control text">
	<input type="text" name="tentinhtranglaodong" id="tentinhtranglaodong" value="<?php echo isset($tentinhtranglaodong) ? $tentinhtranglaodong : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" />
</div>
<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if($list && $list->count() > 0) : ?>
<table class="table hovered striped">
<thead>
	<tr>
		<th>STT</th>
		<th>Tên tình trạng lao động</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
<?php
$i = 1;
foreach($list as $l){
	if($i%2 ==0) $class='eve';
	else $class = 'odd';
	echo '<tr class="'.$class.'">';
	echo '<td align="center">'.$i.'</td>';
	echo '<td>'.$l['ten'].'</td>';
	if(($users->getRole() & ADMIN) == ADMIN){
		echo '<td><a href="tinhtranglaodong.php?id='.$l['_id'].'&ten='.$l['ten'].'&act=del" onclick="return confirm(\'Chắc chắn xoá?\')"><span class="mif-bin"></span></a></td>';
		echo '<td><a href="tinhtranglaodong.php?id='.$l['_id'].'"><span class="mif-pencil"></span></a></td>';	}
	echo '</tr>';
	$i++;
}
?>	
</tbody>
<tfoot>
	<tr>
		<th>STT</th>
		<th>Tên tình trạng lao động</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</tfoot>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>