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
$tendiachi = isset($_GET['tendiachi']) ? $_GET['tendiachi'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id2 = isset($_GET['id2']) ? $_GET['id2'] : '';
$id3 = isset($_GET['id3']) ? $_GET['id3'] : '';
$id4 = isset($_GET['id4']) ? $_GET['id4'] : '';
$id_parent = isset($_GET['id_parent']) ? $_GET['id_parent'] : 0;
$id_root = isset($_GET['id_root']) ? $_GET['id_root'] : 0;
$key1 = isset($_GET['k1']) ? $_GET['k1'] : 0;
$key2 = isset($_GET['k2']) ? $_GET['k2'] : 0;
$key3 = isset($_GET['k3']) ? $_GET['k3'] : 0;
$key4 = isset($_GET['k4']) ? $_GET['k4'] : 0;
$key5 = isset($_GET['k5']) ? $_GET['k5'] : 0;
?>
<?php if(($users->getRole() & ADMIN) == ADMIN): ?>
<h2>Sửa địa chỉ </h2>
<form action="#" id="suadiachiform" onsubmit="return false;">
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
	<input type="hidden" name="id_root" id="id_root" value="<?php echo isset($id_root) ? $id_root : '';  ?>" />
	<input type="hidden" name="level" id="level" value="<?php echo isset($level) ? $level : '';  ?>" />
	<input type="hidden" name="key1" id="key1" value="<?php echo isset($key1) ? $key1 : '';  ?>" />
	<input type="hidden" name="key2" id="key2" value="<?php echo isset($key2) ? $key2 : '';  ?>" />
	<input type="hidden" name="key3" id="key3" value="<?php echo isset($key3) ? $key3 : '';  ?>" />
	<input type="hidden" name="key4" id="key4" value="<?php echo isset($key4) ? $key4 : '';  ?>" />
	<input type="hidden" name="key5" id="key5" value="<?php echo isset($key5) ? $key5 : '';  ?>" />
	<input type="hidden" name="id2" id="id2" value="<?php echo isset($id2) ? $id2 : '';  ?>" />
	<input type="hidden" name="id3" id="id3" value="<?php echo isset($id3) ? $id3 : '';  ?>" />
	<input type="hidden" name="id4" id="id4" value="<?php echo isset($id4) ? $id4 : '';  ?>" />
	<div class="grid">
		<div class="row cells12">
			<div class="cell colspan6 input-control text">
				<input type="text" name="tendiachi" id="tendiachi" value="<?php echo isset($tendiachi) ? $tendiachi : ''; ?>" class="edit-text" size="50" required oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" placeholder="Tên địa chỉ"/>
			</div>
			<div class="cell colspan6 input-control select">
				<select name="parent" id="parent" class="diachi" disabled>
					<option value="">Cấp trên</option>
					<?php
						$diachi_list = $diachi->get_all_list();
						if($diachi_list){
							foreach ($diachi_list as $k1 => $a1) {
								echo '<option value="2__'.$a1['_id'].'__'.$k1.'"'.(($level==2 && $a1['_id']==$id_parent) ? ' selected' : '').'>'.$a1['tendiachi'].'</option>';
								if($a1['level2']){
									foreach ($a1['level2'] as $k2 => $a2) {
										echo '<option value="3__'.$a2['_id'].'__'.$k1.'__'.$k2.'"'.(($level==3 && $a2['_id']==$id_parent) ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;-'.$a2['tendiachi'].'</option>';
										if($a2['level3']){
											foreach ($a2['level3'] as $k3 => $a3) {
												echo '<option value="4__'.$a3['_id'].'__'.$k1.'__'.$k2.'__'.$k3.'"'.(($level==4 && $a3['_id']==$id_parent) ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--'.$a3['tendiachi'].'</option>';
												if($a3['level4']){
													foreach ($a3['level4'] as $k4 => $a4) {
														echo '<option value="5__'.$a4['_id'].'__'.$k1.'__'.$k2.'__'.$k3.'__'.$k4.'"'.(($level==5 && $a4['_id']==$id_parent) ? ' selected' : '').'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---'.$a4['tendiachi'].'</option>';
													}
												}
											}
										}
									}
								}
							}
						}
					?>
				</select>
			</div>
		</div>
		<div class="row cells12 align-center">
			<div class="cell colspan12">
				<a href="#" id="update_diachi" class="button primary fg-white" onclick="return false;"><span class="mif-checkmark"></span> Cập nhật</a>
				<a href="#" id="delete_diachi" class="button alert fg-white" onclick="return false;"><span class="mif-bin"></span> Xoá</a>		
			</div>
		</div>
	</div>
</form>

<div data-role="dialog" id="dialog_delete" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true">
	<h2>Chắc chắn xoá?</h2>
	<p>Nếu xoá sẽ mất hết các địa chỉ con.</p>
	<form action="#" id="xoadiachiform">
		<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '';  ?>" />
		<input type="hidden" name="id_root" id="id_root" value="<?php echo isset($id_root) ? $id_root : '';  ?>" />
		<input type="hidden" name="level" id="level" value="<?php echo isset($level) ? $level : '';  ?>" />
		<input type="hidden" name="key1" id="key1" value="<?php echo isset($key1) ? $key1 : '';  ?>" />
		<input type="hidden" name="key2" id="key2" value="<?php echo isset($key2) ? $key2 : '';  ?>" />
		<input type="hidden" name="key3" id="key3" value="<?php echo isset($key3) ? $key3 : '';  ?>" />
		<input type="hidden" name="key4" id="key4" value="<?php echo isset($key4) ? $key4 : '';  ?>" />
		<input type="hidden" name="key5" id="key5" value="<?php echo isset($key5) ? $key5 : '';  ?>" />
		<input type="hidden" name="action" id="action" value="delete" />
		<input type="hidden" name="id2" id="id2" value="<?php echo isset($id2) ? $id2 : '';  ?>" />
		<input type="hidden" name="id3" id="id3" value="<?php echo isset($id3) ? $id3 : '';  ?>" />
		<input type="hidden" name="id4" id="id4" value="<?php echo isset($id4) ? $id4 : '';  ?>" />
	</form>
	<a href="#" onclick="return false;" class="button primary fg-white" id="delete_ok"><span class="mif-bin"></span> Đồng ý</a>
	<a href="#" onclick="return false;" class="button" id="delete_no"><span class="mif-not"></span> Huỷ không xoá</a>
</div>
<?php endif; ?>
