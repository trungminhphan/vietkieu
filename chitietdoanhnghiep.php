<?php
require_once('header.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$doanhnghiep = new DoanhNghiep();$diachi = new DiaChi();
$doanhnghiep->id = $id; $dn = $doanhnghiep->get_one();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".show_logo").click(function(){
			var dialog = $("#logo_dialog").data('dialog');
			dialog.open();
		});
	});
</script>
<h1><a href="doanhnghiep.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết Doanh nghiệp</h1>
<table class="table striped hovered bordered border">
<tr>
	<td>Logo</td>
	<td><a href="#" class="show_logo" onclick="return false;"><img src="images/uploads/<?php echo $dn['logo']; ?>" style="height:50px;" /></a></td>
</tr>
<tr>
	<td>Tên Doanh nghiệp</td>
	<td><?php echo $dn['ten']; ?></td>
</tr>
<tr>
	<td>Địa chỉ</td>
	<td>
		<?php
		$diachi_dn = $diachi->tendiachi($dn['diachi']);
		echo $diachi_dn;
		?>
	</td>
</tr>
<tr>
	<td>Số đăng ký kinh doanh</td>
	<td><?php echo $dn['sodkkd']; ?></td>
</tr>
<tr>
	<td>Vốn đăng ký kinh doanh</td>
	<td><?php echo $dn['vondkkd']; ?></td>
</tr>
<tr>
	<td>Ngày đăng ký kinh doanh</td>
	<td><?php echo $dn['ngaydkkd'] ? date("d/m/Y",$dn['ngaydkkd']->sec) : ''; ?></td>
</tr>
<tr>
	<td>Hình thức đầu tư</td>
	<td><?php echo $dn['hinhthucdautu']; ?></td>
</tr>
<tr>
	<td>Tình trạng hoạt động</td>
	<td><?php echo $dn['tinhtranghoatdong']; ?></td>
</tr>
<tr>
	<td>Lĩnh vực kinh doanh</td>
	<td><?php echo $dn['linhvuckinhdoanh']; ?></td>
</tr>
<tr>
	<td>Ghi chú</td>
	<td><?php echo nl2br($dn['ghichu']); ?></td>
</tr>
</table>
<div data-role="dialog" id="logo_dialog" data-close-button="true">
	<img src="images/uploads/<?php echo $dn['logo']; ?>" style="max-height:650px;"/>
</div>
<?php require_once('footer.php'); ?>