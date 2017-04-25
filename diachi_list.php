<?php
require_once('header.php');
$diachi = new DiaChi();
$query = array('_id' => new MongoId('5576ece4d89398ec07000029'));
$diachi_list = $diachi->get_list_condition($query);
$diachi1 = new DiaChi1();
?>
<?php if($diachi_list): ?>
<?php 
foreach($diachi_list as $dc){
	if(isset($dc['level2']) && $dc['level2']){
		foreach ($dc['level2'] as $a2) {
			echo $a2['tendiachi'] . '<br />';
			$id_1 = new MongoId();
			$diachi1->id = $id_1;
			$diachi1->ten = $a2['tendiachi'];
			$diachi1->id_parent = "";
			$diachi1->insert();
			if(isset($a2['level3']) && $a2['level3']){
				foreach ($a2['level3'] as $a3) {
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $a3['tendiachi'] . '<br />';
					$id_2 = new MongoId();
					$diachi1->id = $id_2;
					$diachi1->ten = $a3['tendiachi'];
					$diachi1->id_parent = $id_1;
					$diachi1->insert();
					if(isset($a3['level4']) && $a3['level4']){
						foreach ($a3['level4'] as $a4) {
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $a4['tendiachi'] . '<br />';
							$id_3 = new MongoId();
							$diachi1->id = $id_3;
							$diachi1->ten = $a4['tendiachi'];
							$diachi1->id_parent = $id_2;
							$diachi1->insert();
						}
					}
				}
			}
		}
	}
}
?>
<?php endif; ?>
<?php require_once('footer.php'); ?>
