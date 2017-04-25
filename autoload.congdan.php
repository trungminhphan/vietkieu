<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan();$quocgia = new QuocGia();

if($_POST) {
	//sanitize post value
	$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	
	//throw HTTP error if group number is not valid
	if(!is_numeric($group_number)){
		header('HTTP/1.1 500 Invalid number!');
		exit();
	}
	//get current starting point of records
	$position = ($group_number * $items_per_group);
	//Limit our results within a specified range. 
	//$results = $mysqli->query("SELECT id,name,message FROM paginate ORDER BY id ASC LIMIT $position, $items_per_group");
	$congdan_list = $congdan->get_list_to_position($position, $items_per_group);
	if ($congdan_list) { 
		//output results from database
		//var_dump($congdan_list);
		$i = 1;
		foreach($congdan_list as $cd){
			//if($cd['id_quoctich']){ $quocgia->id = $cd['id_quoctich']; $qt = $quocgia->get_one(); }
			echo '<tr class="items">';
			echo '<td>'.($i + $position).'</td>';
			echo '<td>'.$cd['code'].'</td>';
			//echo '<td>'.$cd['passport'].'</td>';
			echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
			echo '<td>'.date("d/m/Y",$cd['ngaysinh']->sec).'</td>';
			echo '<td>'.$cd['gioitinh'].'</td>';
			
			//echo '<td align="center">'.(isset($qt) ? $qt['ten']: '').'</td>';
			//echo '<td>'.$cd['quequan'].'</td>';
			//echo '<td>'.$cd['diachi'].'</td>';
			if(($users->getRole() & ADMIN) == ADMIN){
				echo '<td><a href="suacongdan.php?id='.$cd['_id'].'"><span class="mif-pencil"></span></a></td>';
				echo '<td><a href="xoacongdan.php?id='.$cd['_id'].'&act=del" onclick="return false;" class="remove_item"><span class="mif-bin"></span></a></td>';
			}
			echo '<td><a href="congdan.php?id='.$cd['_id'].'"><span class="mif-profile"></span></a></td>';
			echo '</tr>';
			$i++;
		}
	
	}
}
?>


