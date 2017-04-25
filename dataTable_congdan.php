<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();$quocgia = new QuocGia();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$start = isset($_GET['start']) ? $_GET['start'] : 0;  
$length = isset($_GET['length']) ? $_GET['length'] : 0; 
$draw = isset($_GET['draw']) ? $_GET['draw'] : 0; 
$keysearch = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

$condition = array('$or' => array(array('hoten' => new MongoRegex('/' . $keysearch . '/i')), array('code' => array('$eq' => new MongoInt64($keysearch)))));

$congdan = new CongDan();
$congdan_list = $congdan->get_list_to_position_condition($condition, $start, $length);
$recordsTotal = $congdan->count_all();
$recordsFiltered = $congdan->get_totalFilter($condition);
$arr_congdan = array();
if(isset($congdan_list) && $congdan_list){
	$i= $start+1;
	foreach ($congdan_list as $cd) {
		$ngaysinh = $cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '';
		if(isset($cd['quoctich']) && $cd['quoctich']){
            $quoctich = $quocgia->get_quoctich($cd['quoctich']);
        } else {
            $quoctich = '';
        }
		//if($users->is_admin()){
			array_push($arr_congdan, array('<input type="radio" name="choose" value="'.$cd['_id'].'" class="choose" onmouseover="return choose(); "/>', $i,
										$cd['code'], 
										'<a href="congdan.php?id='.$cd['_id'].'">'. $cd['hoten'] . '</a>', 
										$ngaysinh, 
										$cd['gioitinh'],
										$quoctich));
										//'<a href="suacongdan.php?id='.$cd['_id'].'"><span class="mif-pencil"></span></a>', 
										//'<a href="xoacongdan.php?id='.$cd['_id'].'&act=del" onclick="return confirm(\'Bạn chắn chắn xoá?\');" class="remove_item"><span class="mif-bin"></span></a>',
										//'<a href="congdan.php?id='.$cd['_id'].'"><span class="mif-profile"></span></a>'));
		/*} else {
			array_push($arr_congdan, array($i,
										$cd['code'], 
										'<a href="congdan.php?id='.$cd['_id'].'">'. $cd['hoten'] . '</a>', 
										$ngaysinh, 
										$cd['gioitinh'], 
										'<a href="congdan.php?id='.$cd['_id'].'"><span class="mif-profile"></span></a>'));
		}*/
		$i++;
	}
}
echo json_encode(
  array('draw' => $draw,
        'recordsTotal' => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data' => $arr_congdan
    ));
?>