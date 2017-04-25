<?php require_once('header.php'); 
$congdan = new CongDan();
$total = $congdan->count_all();
$total_groups = ceil($total/$items_per_group);

if(isset($_GET['submit'])){
	$keysearch = isset($_GET['keysearch']) ? $_GET['keysearch'] : '';
	$query = array('$or'=> array(array('cmnd'=> new MongoRegex('/'.$keysearch.'/')), array('passport' => new MongoRegex('/'.$keysearch.'/')), array('hoten'=> new MongoRegex('/'.$keysearch.'/i'))));
	$congdan_list = $congdan->get_list_condition($query);
}
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/html5.messages.js"></script>
<script type="text/javascript" src="js/autoload_data.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#congdan_list").dataTable({
	        "processing": true, "serverSide": true,
	        "ajax": "dataTable_congdan.php",
	        "columnDefs": [
			    { "orderable": false, "targets": 0 },
			    { "orderable": false, "targets": 1 },
			    { "orderable": false, "targets": 2 },
			    { "orderable": false, "targets": 3 },
			    { "orderable": false, "targets": 4 },
			    { "orderable": false, "targets": 5 },
			    { "orderable": false, "targets": 6 }
			    //{ "orderable": false, "targets": 7 }
			]			
	    });
	    //open_confirm_delete();
	    controler_nav();

	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Tìm công dân</h1>
<h3 class="align-center">Có tổng cộng <b><?php echo format_number($total); ?></b> Công dân trong CSDL</h3>
<div class="toolbar align-right">
    <button class="toolbar-button" id="edit_congdan"><span class="mif-pencil"/></button>
    <button class="toolbar-button" id="edit_xoacongdan"><span class="mif-bin" /></button>
    <button class="toolbar-button" id="edit_xemthongtin"><span class="mif-profile" /></button>
    <input type="hidden" name="id" id="id" value="" style="300px;" /> 
</div>
<table class="table hovered striped" id="congdan_list">
	<thead>
		<tr>
			<th>#</th>
			<th>STT</th>
			<th>ID</th>
			<th>Họ tên</th>
			<th>Ngày sinh</th>
			<th>Giới tính</th>
			<th>Quốc tịch</th>
			<!--<th><span class="mif-pencil"></span></th>
			<th><span class="mif-bin"></span></th>
			<th><span class="mif-profile"></span></th>-->
		</tr>
	</thead>
	</tboby></tbody>
</table>

<div data-role="dialog" id="confirm_delete" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true">
	<h2><span class="mif-bin fg-black"></span> Chắc chắn xoá?</h2>
	<p>Nếu chắc xoá sẽ mất các dữ liệu liên quan đến công dân này.</p>
	<div class="align-center">
		<a href="#" onclick="return false;" class="button primary fg-white" id="delete_ok"><span class="mif-bin"></span> Đồng ý</a>
		<a href="#" onclick="return false;" class="button" id="delete_no"><span class="mif-not"></span> Huỷ không xoá</a>
	</div>
</div>

<!------------------------------ dialog confirm delete ----------------------- -->
<div data-role="dialog" id="confirm_delete" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true">
    <h2><span class="mif-bin fg-black"></span> Chắc chắn xoá?</h2>
    <p>Nếu chắc xoá sẽ mất các dữ liệu liên quan đến công dân này.</p>
    <div class="align-center">
        <a href="#" onclick="return false;" class="button primary fg-white" id="delete_ok"><span class="mif-bin"></span> Đồng ý</a>
        <a href="#" onclick="return false;" class="button" id="delete_no"><span class="mif-not"></span> Huỷ không xoá</a>
    </div>
</div>
<?php require_once('footer.php'); ?>