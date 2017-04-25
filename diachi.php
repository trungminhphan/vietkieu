<?php require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$diachi = new DiaChi();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id_parent = isset($_GET['id_parent']) ? $_GET['id_parent'] : '';
$id_root = isset($_GET['id_root']) ? $_GET['id_root'] : '';
$id2 = isset($_GET['id2']) ? $_GET['id2'] : '';
$id3 = isset($_GET['id3']) ? $_GET['id3'] : '';
$id4 = isset($_GET['id4']) ? $_GET['id4'] : '';

$update = isset($_GET['update']) ? $_GET['update'] : '';
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật';
}
if(isset($_POST['submit'])){
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$tendiachi = isset($_POST['tendiachi']) ? $_POST['tendiachi'] : '';
	$parent = isset($_POST['parent']) ? $_POST['parent'] : '';

	if($parent){
		$arr = explode("__", $parent); 
		$level = $arr[0]; $id_parent = $arr[1];$id_root = $arr[2];
		$k1 = isset($arr[3]) ? $arr[3] : 0;
		$k2 = isset($arr[4]) ? $arr[4] : 0;
		$k3 = isset($arr[5]) ? $arr[5] : 0;
		$k4 = isset($arr[6]) ? $arr[6] : 0;
	} else {
		$level = 1;
	}

	if($id){
		transfers_to('diachi.php?update=no');
	} else {
		$diachi->id = $id_parent;
		$diachi->tendiachi = trim($tendiachi);
		if($level==1){
			if($diachi->insert_level1()){
				transfers_to('diachi.php?update=ok&id_parent='.$id_parent .'&id_root='.$id_root);
			}
		} else if($level==2){
			if($diachi->insert_level2()){
				transfers_to('diachi.php?update=ok&id_parent='.$id_parent.'&id_root='.$id_root);
			}
		} else if($level==3){
			$diachi->k2 = $k2;
			if($diachi->insert_level3()){
				transfers_to('diachi.php?update=ok&id_parent='.$id_parent.'&id_root='.$id_root);
			}
		} else if($level==4){
			$diachi->k2 = $k2;$diachi->k3 = $k3;
			if($diachi->insert_level4()){
				transfers_to('diachi.php?update=ok&id_parent='.$id_parent.'&id_root='.$id_root);
			}
		} 
		else if($level==5){
			$diachi->k2 = $k2;$diachi->k3 = $k3;$diachi->k4 = $k4;
			if($diachi->insert_level5()){
				transfers_to('diachi.php?update=ok&id_parent='.$id_parent.'&id_root='.$id_root);
			}
		} else {
			transfers_to('diachi.php?update=no');
		}
	}
}
$diachi_list = $diachi->get_all_list();
?>
<script type="text/javascript" src="js/html5.messages.js"></script>
<script type="text/javascript" src="js/jquery.setcase.js"></script>
<script type="text/javascript" src="js/diachi.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#tendiachi").focus();
		$("input[type='text']").toCapitalize();
		<?php if(isset($msg) && $msg): ?>
			$.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
		<?php endif; ?>
		$(".diachi").select2();
		suadiachi(); themdiachi();
	});
</script>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Địa chỉ</h1>
<div style="padding:5px;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="diachiform">
	<a href="diachi.php" class="button"><span class="mif-sync-problem"></span> Tải lại trang</a>
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<div class="input-control text">
		<input type="text" name="tendiachi" id="tendiachi" value="<?php echo isset($tendiachi) ? $tendiachi : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên địa chỉ" style="width:12.5rem;" />
	</div>
	<div class="input-control select">
		<select name="parent" id="parent" class="diachi" style="width:25.125rem;">
			<option value="">Quốc gia</option>
			<?php
			/*	$diachi_list = $diachi->get_all_list();
				if($diachi_list){
					foreach ($diachi_list as $k1 => $a1) {
						echo '<option value="2__'.$a1['_id'].'__'.$a1['_id'].'__'.$k1.'"'.($a1['_id']==$id_parent ? ' selected' : '').'>'.$a1['tendiachi'].'</option>';
						if($a1['level2']){
							foreach ($a1['level2'] as $k2 => $a2) {
								echo '<option value="3__'.$a2['_id'].'__'.$a1['_id'].'__'.$k1.'__'.$k2.'"'.($a2['_id']==$id_parent ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;-'.$a2['tendiachi'].'</option>';
								if($a2['level3']){
									foreach ($a2['level3'] as $k3 => $a3) {
										echo '<option value="4__'.$a3['_id'].'__'.$a1['_id'].'__'.$k1.'__'.$k2.'__'.$k3.'"'.($a3['_id']==$id_parent ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--'.$a3['tendiachi'].'</option>';
										if($a3['level4']){
											foreach ($a3['level4'] as $k4 => $a4) {
												echo '<option value="5__'.$a4['_id'].'__'.$a1['_id'].'__'.$k1.'__'.$k2.'__'.$k3.'__'.$k4.'"'.($a4['_id']==$id_parent ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---'.$a4['tendiachi'].'</option>';
											}
										}
									}
								}
							}
						}
					}
				}
				*/
			?>
		</select>
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
</form>
</div>
<?php endif; ?>
<?php if(isset($diachi_list) && $diachi_list) : ?>
	<h3><a href="#" class="mif-earth"><span></span></a>&nbsp;<b>Danh sách các địa chỉ</b></h3>
	<div class="treeview" data-role="treeview">
		<ul>
			<?php
			foreach ($diachi_list as $k1 => $a1) {
				echo '<li class="node '.($a1['_id']==$id_root ? ' active' : ' collapsed').'"><span class="leaf"><b>'.$a1['tendiachi'].'</b></span><span class="node-toggle"></span>&nbsp;<a href="get.suadiachi.php?id_root='.$a1['_id'].'&id='.$a1['_id'].'&tendiachi='.$a1['tendiachi'].'&level=1" onclick="return false;" class="suadiachi"><span class="mif-pencil"></span></a>&nbsp;<a href="get.themdiachi.php?id_root='.$a1['_id'].'&id='.$a1['_id'].'&level=1" onclick="return false;" class="themdiachi"><span class="mif-plus"></span></a>';
				if(isset($a1['level2']) && $a1['level2']){
					echo '<ul>';
					foreach ($a1['level2'] as $k2 => $a2) {
						echo '<li class="node '.($a2['_id']==$id2 ? 'active' : 'collapsed').'"><span class="leaf">'.$a2['tendiachi'].'</span><span class="node-toggle"></span>&nbsp;<a href="get.suadiachi.php?id_root='.$a1['_id'].'&id_parent='.$a1['_id'].'&id='.$a2['_id'].'&tendiachi='.$a2['tendiachi'].'&id2='.$a2['_id'].'&level=2&k2='.$k2.'" class="suadiachi" onclick="return false;"><span class="mif-pencil"></span></a>&nbsp;<a href="get.themdiachi.php?id_root='.$a1['_id'].'&id_parent='.$a1['_id'].'&id='.$a2['_id'].'&id2='.$a2['_id'].'&level=2&k2='.$k2.'" class="themdiachi" onclick="return false;"><span class="mif-plus"></span></a>';
						if(isset($a2['level3']) && $a2['level3']){
							echo '<ul>';
								foreach ($a2['level3'] as $k3 => $a3) {
									echo '<li class="node '.($a3['_id']==$id3 ? 'active' : 'collapsed').'"><span class="leaf">'.$a3['tendiachi'].'</span><span class="node-toggle"></span>&nbsp;<a href="get.suadiachi.php?id_root='.$a1['_id'].'&id_parent='.$a2['_id'].'&id='.$a3['_id'].'&tendiachi='.$a3['tendiachi'].'&level=3&id2='.$a2['_id'].'&id3='.$a3['_id'].'&k2='.$k2.'&k3='.$k3.'" class="suadiachi" onclick="return false;"><span class="mif-pencil"></span></a>&nbsp;<a href="get.themdiachi.php?id_root='.$a1['_id'].'&id_parent='.$a2['_id'].'&id='.$a3['_id'].'&tendiachi='.$a3['tendiachi'].'&level=3&id2='.$a2['_id'].'&id3='.$a3['_id'].'&k2='.$k2.'&k3='.$k3.'" class="themdiachi" onclick="return false;""><span class="mif-plus"></span></a>';
									if(isset($a3['level4']) && $a3['level4']){
										echo '<ul>';
										foreach ($a3['level4'] as $k4=>$a4) {
											echo '<li class="node '.($a4['_id']==$id4 ? 'active' : 'collapsed').'"><span class="leaf">'.$a4['tendiachi'].'</span><span class="node-toggle"></span>&nbsp;<a href="get.suadiachi.php?id_root='.$a1['_id'].'&id_parent='.$a3['_id'].'&id='.$a4['_id'].'&tendiachi='.$a4['tendiachi'].'&level=4&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&k2='.$k2.'&k3='.$k3.'&k4='.$k4.'" class="suadiachi" onclick="return false;"><span class="mif-pencil"></span></a>&nbsp;<a href="get.themdiachi.php?id_root='.$a1['_id'].'&id_parent='.$a3['_id'].'&id='.$a4['_id'].'&tendiachi='.$a4['tendiachi'].'&level=4&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&k2='.$k2.'&k3='.$k3.'&k4='.$k4.'" class="themdiachi" onclick="return false;"><span class="mif-plus"></span></a>';
											if(isset($a4['level5']) && $a4['level5']){
												echo '<ul>';
												foreach ($a4['level5'] as $k5 => $a5) {
													echo '<li><span class="mif-chevron-right"></span><span class="leaf">'.$a5['tendiachi'].'</span>&nbsp;<a href="get.suadiachi.php?id_root='.$a1['_id'].'&id_parent='.$a4['_id'].'&id='.$a5['_id'].'&tendiachi='.$a5['tendiachi'].'&level=5&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&k2='.$k2.'&k3='.$k3.'&k4='.$k4.'&k5='.$k5.'" class="suadiachi" onclick="return false;"><span class="mif-pencil"></span></a></li>';
												}
												echo '</ul>';
											}
											echo '</li>';
										}
										echo '</ul>';
									}
									echo '</li>';
								}
							echo '</ul>';
						}
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</li>';			
			}
			?>
		</ul>
	</div>
<?php endif; ?>
<div data-role="dialog" id="dialog_suadiachi" data-close-button="true" class="padding20" data-overlay="true" >
	<div id="content_dialog" style="width:800px;padding: 20px;"></div>
</div>
<div data-role="dialog" id="dialog_themdiachi" data-close-button="true" class="padding20" data-overlay="true" >
	<div id="content_dialog_themdiachi" style="width:800px;padding:20px;"></div>
</div>
<?php require_once('footer.php'); ?>