<?php require_once('header.php');
$congdan = new CongDan();

$congdan_list = $congdan->get_all_list();

if($congdan_list){
	foreach ($congdan_list as $cd) {
		$congdan->id = $cd['_id'];
		if($cd['ngaysinh']){
			$ngaysinh = new MongoDate(strtotime(date("Y-m-d 00:00:00", $cd['ngaysinh']->sec)));
		} else {
			$ngaysinh = '';
		}
		$congdan->ngaysinh = $ngaysinh;
		$congdan->set_ngaysinh();
		echo $ngaysinh;
		echo '<hr />';
	}
}
?>
<?php require_once('footer.php');?>