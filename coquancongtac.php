<?php 
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$coquancongtac = new CoQuanCongTac();$congdan = new CongDan();
$coquancongtac_list = $coquancongtac->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : '';
$loaicoquan ='';
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật';
}
if($id && $act=='del'){
	if($congdan->check_dm_coquancongtac($id)){
		$msg = 'Không thể xoá... [hoctap]';
	} else {
		$coquancongtac->id = $id;
		if($coquancongtac->delete()){
			transfers_to('coquancongtac.php?update=ok');
		} else {
			$msg = 'Không thể xoá';
		}
	}
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tencoquancongtac = isset($_POST['tencoquancongtac']) ? $_POST['tencoquancongtac'] : '';
	$loaicoquan = isset($_POST['loaicoquan']) ? $_POST['loaicoquan'] : '';
	$coquancongtac->id = $id;
	$coquancongtac->ten = trim($tencoquancongtac);
	$coquancongtac->loaicoquan = trim($loaicoquan);

	if($id){
		//edit
		if($coquancongtac->edit()){
			transfers_to('coquancongtac.php?update=ok');
		}
	} else {
		//insert
		if($coquancongtac->check_exists()){
			$msg ='Tên cơ quan công tác đã tồn tại.';
		} else {
			if($coquancongtac->insert()){
				if($url) transfers_to($url);
				else transfers_to('coquancongtac.php?update=ok');
			}
		}
	}
}

if($id){
	$coquancongtac->id = $id;
	$edit = $coquancongtac->get_one();
	$id = $edit['_id'];
	$tencoquancongtac = $edit['ten'];
	$loaicoquan = isset($edit['loaicoquan']) ? $edit['loaicoquan'] : '';
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
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Cơ quan công tác</h1>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="coquancongtacform">
	<a href="coquancongtac.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tencoquancongtac" id="tencoquancongtac" value="<?php echo isset($tencoquancongtac) ? $tencoquancongtac : ''; ?>" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên cơ quan" size="50" />
	</div>
	<div class="input-control text">
		<input type="loaicoquan" name="loaicoquan" id="loaicoquan" value="<?php echo isset($loaicoquan) ? $loaicoquan : ''; ?>" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Loại cơ quan (nhà nước, tư nhân, khác,...)"  />
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
	</form>
<?php endif; ?>

<?php if($coquancongtac_list && $coquancongtac_list->count() > 0): ?>
<table class="table hovered striped dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<th>Tên cơ quan công tác</th>
		<th>Loại cơ quan</th>
		<?php if(($users->getRole() & ADMIN) == ADMIN) : ?>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-pencil"></span></th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
	<?php
	$i = 1;
	foreach($coquancongtac_list as $cqct){
		echo '<tr>';
		echo '<td align="center">'.$i.'</td>';
		//echo '<td>'.$cqct['_id'].'</td>';
		echo '<td>'.$cqct['ten'].'</td>';
		echo '<td>'.(isset($cqct['loaicoquan']) ? $cqct['loaicoquan'] : '').'</td>';
		if(($users->getRole() & ADMIN) == ADMIN){
			echo '<td><a href="coquancongtac.php?id='.$cqct['_id'].'&act=del" onclick="return confirm(\'Chắc chắc xoá?\');" title="Xoá"><span class="mif-bin"></span></a></td>';
			echo '<td><a href="coquancongtac.php?id='.$cqct['_id'].'" title="Sửa"><span class="mif-pencil"></span></a></td>';
		}
		echo '</tr>';
		$i++;
	}
	?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>