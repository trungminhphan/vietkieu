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
$diendidinhcu = new DienDiDinhCu();

$id_dicu = isset($_POST['id_dicu']) ? $_POST['id_dicu'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_quocgia = isset($_POST['id_quocgia']) ? $_POST['id_quocgia'] : '';
$ngaydicu = isset($_POST['ngaydicu']) ? $_POST['ngaydicu'] : '';
$id_diendicu = isset($_POST['id_diendicu']) ? $_POST['id_diendicu'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;

if($id_dicu){
    $congdan->id_dicu = $id_dicu;
    $arr_dicu = array('dicu.$.id_quocgia' => $id_quocgia ? new MongoId($id_quocgia) : '',
                    'dicu.$.ngaydicu' => $ngaydicu ? new MongoDate(convert_date_dd_mm_yyyy($ngaydicu)) : '',
                    'dicu.$.id_diendicu' => $id_diendicu ? new MongoId($id_diendicu) : ''
    );
    $congdan->dicu = $arr_dicu;
    if($congdan->set_dicu()){
        if($id_quocgia) { $quocgia->id=$id_quocgia; $qg = $quocgia->get_one(); }
        if($id_diendicu) { $diendidinhcu->id = $id_diendicu; $ddc = $diendidinhcu->get_one(); }
        echo '<tr class="items '.$id_dicu.'">';
        echo '<td>'.($qg['ten'] ? $qg['ten'] : '').'</td>';
        echo '<td>'.($ngaydicu ? $ngaydicu : '').'</td>';
        echo '<td>'.($ddc['ten'] ? $ddc['ten'] : '').'</td>';
        echo '<td><a href="get.xoadicu.php?id_congdan='.$id_congdan .'&id_dicu='.$id_dicu.'" class="xoadicu" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suadicu.php?id_congdan='.$id_congdan .'&id_dicu='.$id_dicu.'" class="suadicu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    } else {
        echo 'Failed';
    }
} else {
    $id_dicu = new MongoId();
    $arr_dicu = array('id_dicu' => new MongoId($id_dicu),
    					'id_quocgia' => $id_quocgia ? new MongoId($id_quocgia) : '',
    					'ngaydicu' => $ngaydicu ? new MongoDate(convert_date_dd_mm_yyyy($ngaydicu)) : '',
    					'id_diendicu' => $id_diendicu ? new MongoId($id_diendicu) : '',
                        'date_post' => new MongoDate(),
                        'id_user' => $id_user ? new MongoId($id_user) : '');
    $congdan->dicu = $arr_dicu;
    if($congdan->push_dicu()){
    	if($id_quocgia) { $quocgia->id=$id_quocgia; $qg = $quocgia->get_one(); }
        if($id_diendicu) { $diendidinhcu->id = $id_diendicu; $ddc = $diendidinhcu->get_one(); }
        echo '<tr class="items '.$id_dicu.'">';
        echo '<td>'.($qg['ten'] ? $qg['ten'] : '').'</td>';
        echo '<td>'.($ngaydicu ? $ngaydicu : '').'</td>';
        echo '<td>'.($ddc['ten'] ? $ddc['ten'] : '').'</td>';
        echo '<td><a href="get.xoadicu.php?id_congdan='.$id_congdan .'&id_dicu='.$id_dicu.'" class="xoadicu" onclick="return false;"><span class="mif-bin"></span></a></td>';
        echo '<td><a href="get.suadicu.php?id_congdan='.$id_congdan .'&id_dicu='.$id_dicu.'" class="suadicu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    }
}
?>