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
$q = isset($_GET['q']) ? $_GET['q'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 0;

//$condition = array('hoten' => new MongoRegex('/' . $q . '/i'));
$condition = array('$or' => array(array('hoten' => new MongoRegex('/' . $q . '/i')), array('code' => array('$eq' => intval($q)))));

$total_count = $congdan->get_list_condition($condition)->count();
$list_congdan = $congdan->get_list_to_position_condition($condition, $page, 30);

$arr = array();
if($list_congdan){
  $i=1;
	foreach ($list_congdan as $cd) {
      //$id_congdan = $cd['_id']->$id;
      //echo json_encode($cd['_id']->{'$id'});
    if($cd['quoctich']) $tenquoctich = $quocgia->get_quoctich($cd['quoctich']);
			array_push($arr, array('id' => $cd['_id']->{'$id'}, 'hoten' => $cd['hoten'], 'ngaysinh' => date("d/m/Y",$cd['ngaysinh']->sec), 'code' => $cd['code'], 'quoctich' => $tenquoctich, 'text' => $cd['hoten'] . ' [ID: ' . $cd['code'] . ']'));		
      $i++;
	}
}

echo json_encode(array(
		"total_count" => $total_count,
  	"incomplete_results" => false,
		"items" => $arr));
?>

