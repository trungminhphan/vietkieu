<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$diachi = new DiaChi();
$id_parent = isset($_GET['id_parent']) ? $_GET['id_parent'] : 0;
$id_root = isset($_GET['id_root']) ? $_GET['id_root'] : 0;
$level = isset($_GET['level']) ? $_GET['level'] : 0;

$diachi_list = $diachi->get_list_condition(array('_id' => new MongoId($id_root)));

if($level==2){
	if($diachi_list){
		foreach ($diachi_list as $a1) {
			if($a1['_id'] == $id_root && $a1['level2']){
				echo '<option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>';
				foreach ($a1['level2'] as $a2) {
					echo '<option value="'.$a2['_id'].'">'.$a2['tendiachi'].'</option>';
				}
			}
		}
	}
} else if($level==3){
	if($diachi_list){
		foreach ($diachi_list as $a1) {
			if($a1['_id'] == $id_root){
				if($a1['level2']){
					foreach ($a1['level2'] as $a2) {
						if($a2['_id']==$id_parent && $a2['level3']){
							echo '<option value="">Huyện/TP</option>';
							foreach ($a2['level3'] as $a3) {
								echo '<option value="'.$a3['_id'].'">'.$a3['tendiachi'].'</option>';
							}
						}
					}
				}
			}
		}
	}
} else if ($level==4){
	if($diachi_list){
		foreach ($diachi_list as $a1) {
			if($a1['_id'] == $id_root){
				if($a1['level2']){
					foreach ($a1['level2'] as $a2) {
						if($a2['level3']){
							foreach ($a2['level3'] as $a3) {
								if($a3['_id'] == $id_parent && $a3['level4']){
									echo '<option value="">Thị xã, phường, xã</option>';
									foreach ($a3['level4'] as $a4) {
										echo '<option value="'.$a4['_id'].'">'.$a4['tendiachi'].'</option>';
									}	
								}
							}
						}
					}
				}
			}
		}
	}
} else if($level==5){
	if($diachi_list){
		foreach ($diachi_list as $a1) {
			if($a1['_id'] == $id_root){
				if($a1['level2']){
					foreach ($a1['level2'] as $a2) {
						if($a2['level3']){
							foreach ($a2['level3'] as $a3) {
								if($a3['level4']){
									foreach ($a3['level4'] as $a4) {
										if($a4['_id']==$id_parent && $a4['level5']){
											echo '<option value="">Ấp, khóm</option>';
											foreach ($a4['level5'] as $a5) {
												echo '<option value="'.$a5['_id'].'">'.$a5['tendiachi'].'</option>';
											}
										}
									}	
								}
							}
						}
					}
				}
			}
		}
	}
} else {
	echo '<option value="">Bạn chưa chọn</option>';
}

?>