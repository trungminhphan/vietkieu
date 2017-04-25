<?php
require_once('header.php'); 
$congdan = new CongDan();
$query = array('$and' => array(array('hokhauthuongtru.0' => new MongoId('5576ece4d89398ec07000029')), array('$or' => array(array('hokhauthuongtru.1' => ''), array('hokhauthuongtru.1' => array('$exists' => false))))));
$list_congdan = $congdan->get_list_condition($query);
?>
<table class="table border bordered">
<thead>
<tr>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên</th>
</tr>
</thead>
<tbody>
<?php
if($list_congdan){
	$i=1;
	foreach ($list_congdan as $cd) {
		$congdan->id = $cd['_id'];
		$noisinh = array( new MongoId('5576ece4d89398ec07000029'),
				new MongoId('56d000015c1e88f5048b4567'),
				'', '','','');
		//$congdan->set_tinh_chuaxacdinh($cd['_id'], $noisinh);
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<tr>';$i++;
	}
}
?>
</tbody>
</table>

<?php require_once('footer.php'); ?>