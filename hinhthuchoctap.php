<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$hinhthuchoctap = new HinhThucHocTap(); $congdan = new CongDan();
$hinhthuchoctap_list = $hinhthuchoctap->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : ''; 
$update = isset($_GET['update']) ? $_GET['update'] : ''; 
if($update=='ok'){
	$msg= 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật.';
}
if($id && $act=='del'){
	if($congdan->check_dm_hinhthuchoctap($id)){
		$msg = 'Không thể xoá...';
	} else {
		$hinhthuchoctap->id = $id;
		if($hinhthuchoctap->delete()){
			transfers_to('hinhthuchoctap.php?update=ok');
		} else {
			$msg = 'Không thể xoá.';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tenhinhthuchoctap = isset($_POST['tenhinhthuchoctap']) ? $_POST['tenhinhthuchoctap'] : '';
	$hinhthuchoctap->id = $id;
	$hinhthuchoctap->ten = $tenhinhthuchoctap;
	if($id){
		//edit
		if($hinhthuchoctap->edit()){
			transfers_to('hinhthuchoctap.php?update=ok');
		}
	} else {
		//insert
		if($hinhthuchoctap->check_exists()){
			$msg = 'Tên hình thức đã tồn tại.';
		} else {
			if($hinhthuchoctap->insert()){
				if($url) transfers_to($url);
				else transfers_to('hinhthuchoctap.php?update=ok');
			}
		}
	}
}

if($id){
	$hinhthuchoctap->id = $id;
	$edit = $hinhthuchoctap->get_one();
	$id = $edit['_id'];
	$tenhinhthuchoctap = $edit['ten'];
}	
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
<div style="padding:5px;">
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="hinhthuchoctapform">
	<a href="hinhthuchoctap.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tenhinhthuchoctap" id="tenhinhthuchoctap" value="<?php echo isset($tenhinhthuchoctap) ? $tenhinhthuchoctap : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên hình thức học tập" />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
	</form>
</div>
<?php endif; ?>
<?php if($hinhthuchoctap_list && $hinhthuchoctap_list->count() > 0): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<!--<th>#</th>-->
		<th>Tên hình thức học tập</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
	<?php
	$i = 1;
	foreach($hinhthuchoctap_list as $htht){
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		//echo '<td>'.$htht['_id'].'</td>';
		echo '<td>'.$htht['ten'].'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td><a href="hinhthuchoctap.php?id='.$htht['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');"><span class="mif-bin"></a></td>';
			echo '<td><a href="hinhthuchoctap.php?id='.$htht['_id'].'"><span class="mif-pencil"></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>