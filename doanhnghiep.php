<?php
require_once('header.php');
if(!$users->is_admin()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}

$doanhnghiep = new DoanhNghiep();$diachi = new DiaChi();$congdan = new CongDan();
$doanhnghiep_list = $doanhnghiep->get_all_list();
$diachi_list = $diachi->get_all_list();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$update = isset($_GET['update']) ? $_GET['update'] : '';
if($update=='ok'){
	$msg = 'Cập nhật thành công';
}
if($update=='no'){
	$msg = 'Không thể cập nhật.';
}
if($id && $act == 'del'){
	if($congdan->check_dm_doanhnghiep($id)){
		$msg = 'Không thể xoá [doanhnhan]';
	} else {
		$doanhnghiep->id = $id;
		if($doanhnghiep->delete()){
			transfers_to('doanhnghiep.php?update=ok');
		} else {
			$msg = 'Không thể xoá.';
		}
	}
}
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/doanhnghiep.js"></script>
<script type="text/javascript" src="js/jquery.inputmask.js"></script>
<script type="text/javascript" src="js/jquery.number.min.js"></script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Quản lý Doanh nghiệp</h1>
<a href="#" class="button primary" onclick="return false;" id="add_doanhnghiep"><span class="mif-plus"></span> Thêm Doanh nghiệp</a>

<?php if(isset($doanhnghiep_list) && $doanhnghiep_list): ?>
<table class="table striped hovered dataTable" data-role="datatable">
<thead>
	<tr>
		<th>STT</th>
		<th>Tên Doanh nghiệp</th>
		<th>Địa chỉ</th>
		<th>Số ĐKKD</th>
		<th>Vốn ĐKKD</th>
		<th>Ngày ĐKKD</th>
		<th>Hình thức đầu tư</th>
		<th>Tình trạng hoạt động</th>
		<th>Lĩnh vực kinh doanh</th>
		<th><span class="mif-bin"></span></th>
		<th><span class="mif-pencil"></span></th>
	</tr>
</thead>
	<tbody>
	<?php
	$i = 1;
	foreach ($doanhnghiep_list as $dn) {
		$diachi_dn = $diachi->tendiachi($dn['diachi']);
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td><a href="chitietdoanhnghiep.php?id='.$dn['_id'].'">'.$dn['ten'].'</a></td>';
		echo '<td>'.$diachi_dn.'</td>';
		echo '<td>'.$dn['sodkkd'].'</td>';
		echo '<td>'.format_number(doubleval($dn['vondkkd'])).'</td>';
		echo '<td>'.(isset($dn['ngaydkkd']) ? date("d/m/Y",$dn['ngaydkkd']->sec) : '').'</td>';
		echo '<td>'.$dn['hinhthucdautu'].'</td>';
		echo '<td>'.$dn['tinhtranghoatdong'].'</td>';
		echo '<td>'.(isset($dn['linhvuckinhdoanh']) ? $dn['linhvuckinhdoanh'] : '').'</td>';
		echo '<td><a href="doanhnghiep.php?id='.$dn['_id'].'&act=del" onclick="return confirm(\'Chắn chắn xoá?\');"><span class="mif-bin"></span></a></td>';
		echo '<td><a href="get.suadoanhnghiep.php?id='.$dn['_id'].'" onclick="return suadoanhnghiep();"  class="suadoanhnghiep"><span class="mif-pencil"></span></a></td>';
		echo '</tr>';
		$i++;
	}
	?>
	</tbody>
</table>
<?php endif; ?>

<div data-role="dialog" id="dialog_doanhnghiep" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<h2><span class="mif-cabinet"></span> Thông tin Doanh nghiệp?</h2>
<form action="themdoanhnghiep.php" id="doanhnhgiepform" method="POST" data-role="validator" data-show-required-state="false" enctype="multipart/form-data">
	<input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : ''; ?>" />
	<div class="grid">
		<div class="row cells12">
			<div class="cell colspan12 align-left input-control text">
				<input type="text" name="tendoanhnghiep" id="tendoanhnghiep" data-validate-func="required" placeholder="Tên doanh nghiệp"/>
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan4 align-left input-control select">
				<select name="diachi1" id="diachi1" class="select2">
                    <option value="">Quốc gia</option>
                    <?php
                    if($diachi_list){
                        foreach ($diachi_list as $a1) {
                            echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
                        }
                    }
                    ?>
                </select>
			</div>
			<div class="cell colspan4 align-left input-control select">
				<select name="diachi2" id="diachi2" class="select2">
                    <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
                </select>
			</div>
			<div class="cell colspan4 align-left input-control select">
				<select name="diachi3" id="diachi3" class="select2">
                    <option value="">Huyện/TP</option>
                </select>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan4 align-left input-control select">
				<select name="diachi4" id="diachi4" class="select2">
                    <option value="">Thị xã, phường, xã</option>
                </select>
			</div>
			<div class="cell colspan4 align-left input-control select">
				<select name="diachi5" id="diachi5" class="select2">
                    <option value="">Ấp, khóm</option>
                </select>
			</div>
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="diachi6" id="diachi6" placeholder="Số, đường..." />
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="sodkkd" id="sodkkd" placeholder="Số ĐKKD" data-validate-func="required" />
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="vondkkd" id="vondkkd" placeholder="Vốn ĐKKD (tỷ đồng)" data-validate-func="number" />
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
			<div class="cell colspan4 align-left input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
				<input type="text" name="ngaydkkd" id="ngaydkkd" placeholder="Ngày ĐKKD" data-inputmask="'alias': 'date'"/>
				<button class="button" id="del_ngaydkkd"><span class="mif-calendar"></span></button>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="hinhthucdautu" id="hinhthucdautu" data-validate-func="required" placeholder="Hình thức đầu tư" />
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="tinhtranghoatdong" id="tinhtranghoatdong" data-validate-func="required" placeholder="Tình trạng hoạt động" />
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
			<div class="cell colspan4 align-left input-control text">
				<input type="text" name="linhvuckinhdoanh" id="linhvuckinhdoanh" data-validate-func="required" placeholder="Lĩnh vực kinh doanh" />
				<span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan12 align-left input-control textarea">
				<textarea name="ghichu" id="ghichu" placeholder="Ghi chú"></textarea>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan2 padding-top-10"><b>Logo</b></div>
			<div class="cell colspan10 input-control file" data-role="input">
				<input type="file" name="logo" id="logo" />
    			<button class="button"><span class="mif-folder"></span></button>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan12 align-left input-control text">
				<div id="show_logo" style="height:20px;"></div>
				<input type="hidden" name="old_logo" id="old_logo" value="" />
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan12 align-center">
				<button name="submit" id="update_doanhnghiep" value="OK" class="button primary"><span class="mif-checkmark"></span> Cập nhật</button>
				<a href="#" onclick="return false;" class="button" id="close_form"><span class="mif-not"></span> Huỷ</a>
			</div>
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
	doanhnghiep();
	<?php if(isset($msg) && $msg): ?>
		$.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
	<?php endif; ?>
	$("#ngaydkkd").inputmask();
	$("#vondkkd").number(true, 0, ',', '.');
});
</script>
<?php require_once('footer.php'); ?>