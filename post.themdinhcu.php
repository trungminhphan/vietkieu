<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan(); $quocgia = new QuocGia();

$id_dinhcu = isset($_POST['id_dinhcu']) ? $_POST['id_dinhcu'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_quocgia = isset($_POST['id_quocgia']) ? $_POST['id_quocgia'] : '';
$ngaynhaptich  = isset($_POST['ngaynhaptich']) ? $_POST['ngaynhaptich'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;
if($id_dinhcu){
    $congdan->id_dinhcu = $id_dinhcu;
    $arr_dinhcu = array('dinhcu.$.id_quocgia' => $id_quocgia ? new MongoId($id_quocgia) : '',
                        'dinhcu.$.ngaynhaptich' => $ngaynhaptich ? new MongoDate(convert_date_dd_mm_yyyy($ngaynhaptich)) : '');
    $congdan->dinhcu = $arr_dinhcu;
    if($congdan->set_dinhcu()){
        if($id_quocgia) { $quocgia->id=$id_quocgia; $qg = $quocgia->get_one(); }
        echo '<tr class="items '.$id_dinhcu.'">';
        echo '<td>'.($qg['ten'] ? $qg['ten'] : '').'</td>';
        echo '<td>'.($ngaynhaptich ? $ngaynhaptich : '').'</td>';
        echo '<td><a href="get.xoadinhcu.php?id_congdan='.$id_congdan .'&id_dinhcu='.$id_dinhcu.'" class="xoadinhcu" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suadinhcu.php?id_congdan='.$id_congdan .'&id_dinhcu='.$id_dinhcu.'" class="suadinhcu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    } else {
        echo 'Failed';
    }
} else {
    $id_dinhcu = new MongoId();
    $arr_dinhcu = array('id_dinhcu' => new MongoId($id_dinhcu),
    					'id_quocgia' => $id_quocgia ? new MongoId($id_quocgia) : '',
    					'ngaynhaptich' => $ngaynhaptich ? new MongoDate(convert_date_dd_mm_yyyy($ngaynhaptich)) : '',
    					'date_post' => new MongoDate(),
                        'id_user' => $id_user ? new MongoId($id_user) : '');
    $congdan->dinhcu = $arr_dinhcu;

    if($congdan->push_dinhcu()){
    	if($id_quocgia) { $quocgia->id=$id_quocgia; $qg = $quocgia->get_one(); }
        echo '<tr class="items '.$id_dinhcu.'">';
        echo '<td>'.($qg['ten'] ? $qg['ten'] : '').'</td>';
        echo '<td>'.($ngaynhaptich ? $ngaynhaptich : '').'</td>';
        echo '<td><a href="get.xoadinhcu.php?id_congdan='.$id_congdan .'&id_dinhcu='.$id_dinhcu.'" class="xoadinhcu" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suadinhcu.php?id_congdan='.$id_congdan .'&id_dinhcu='.$id_dinhcu.'" class="suadinhcu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    }
}
?>