<?php require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$congdan = new CongDan();
$users_list = $users->get_list();
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".open_window").click(function(){
		  window.open($(this).attr("href"), '_blank', 'toolbar=yes, scrollbars=yes, resizable=yes, top=0, left=100, width=1024, height=800');
		  return false;
		})
	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê Nhập liệu</h1>
<div class="align-right">
	<a href="in_thongkenhaplieu.php" class="open_window button primary"><span class="mif-print"></span> In</a>
</div>
<?php if($users_list && $users_list->count() > 0) : ?>
<table class="table bodered striped">
<thead>
	<tr>
		<th>STT</th>
		<th>Username</th>
		<th>Fullname</th>
		<th>Thống kê Record nhập liệu</th>
	</tr>
</thead>
<tbody>
	<?php
	$i= 1; $total=0;
	foreach ($users_list as $u) {
		$count = $congdan->count_record_to_users($u['_id']);
		$total += $count;
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$u['username'].'</td>';
		echo '<td>'.$u['person'].'</td>';
		echo '<td class="align-right"><b>'.format_number($count).'</b></td>';
		echo '</tr>';
		$i++;
	}
	?>
<tr>
	<td colspan="3">TỔNG CỘNG</td>
	<td class="align-right"><b><?php echo format_number($total); ?></b></td>
</tr>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>