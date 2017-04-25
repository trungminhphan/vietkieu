<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan(); $tinhtranglaodong = new TinhTrangLaoDong();
$quocgia = new QuocGia(); $nganhnghe = new NganhNghe();
$key = isset($_POST['key_laodong']) ? $_POST['key_laodong'] : 0;
$id_laodong = isset($_POST['id_laodong']) ? $_POST['id_laodong'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_quocgia = isset($_POST['id_quocgia']) ? $_POST['id_quocgia'] : '';
$thoigianbatdau = isset($_POST['thoigianbatdau']) ? $_POST['thoigianbatdau'] : '';
$thoigianketthuc = isset($_POST['thoigianketthuc']) ? $_POST['thoigianketthuc'] : '';
$id_nganhnghe = isset($_POST['id_nganhnghe']) ? $_POST['id_nganhnghe'] : '';
$id_tinhtranglaodong = isset($_POST['id_tinhtranglaodong']) ? $_POST['id_tinhtranglaodong'] : '';
$coquanlaodong = isset($_POST['coquanlaodong']) ? $_POST['coquanlaodong'] : '';
$diachicoquanlaodong = isset($_POST['diachicoquanlaodong']) ? $_POST['diachicoquanlaodong'] : '';
$id_user = $users->get_userid();
$congdan->id = $id_congdan;

if($id_quocgia) { $quocgia->id = $id_quocgia;$qg=$quocgia->get_one(); }
if($id_nganhnghe) {$nganhnghe->id = $id_nganhnghe; $nn = $nganhnghe->get_one(); }
if($id_tinhtranglaodong) { $tinhtranglaodong->id = $id_tinhtranglaodong; $ttld = $tinhtranglaodong->get_one(); }

if($id_laodong){
    $arr_laodong = array('laodong.$.id_quocgia' => new MongoId($id_quocgia),
                    'laodong.$.thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
                    'laodong.$.thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
                    'laodong.$.id_nganhnghe' => $id_nganhnghe ? new MongoId($id_nganhnghe) : '',
                    'laodong.$.id_tinhtranglaodong' => $id_tinhtranglaodong ? new MongoId($id_tinhtranglaodong) : '',
                    'laodong.$.coquanlaodong' => $coquanlaodong,
                    'laodong.$.diachicoquanlaodong' => $diachicoquanlaodong);
    $congdan->id_laodong = $id_laodong;
    $congdan->laodong = $arr_laodong;
    if($congdan->set_laodong()){
        echo '<tr class="items '.$id_laodong.'">';
            echo '<td>'. (isset($qg['ten']) ? $qg['ten']: '').'</td>';
            echo '<td>'. (isset($thoigianbatdau) ? $thoigianbatdau : '').'</td>';
            echo '<td>'. (isset($thoigianketthuc) ? $thoigianketthuc : '').'</td>';
            echo '<td>'. (isset($nn['ten']) ? $nn['ten'] : '').'</td>';
            echo '<td>'. (isset($ttld['ten']) ? $ttld['ten'] : '').'</td>';
            echo '<td>'. $coquanlaodong.'</td>';
            echo '<td>'. $diachicoquanlaodong.'</td>';
            echo '<td><a href="get.xoalaodong.php?id_congdan='.$id_congdan .'&id_laodong='.$id_laodong.'" class="xoalaodong" onclick="return false;"><span class="mif-bin"></span></a></td>';
            echo '<td><a href="get.sualaodong.php?id_congdan='.$id_congdan .'&id_laodong='.$id_laodong.'" class="sualaodong" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    } else {
        echo 'Failed';
    }
} else {
    $id_laodong = new MongoId();
    $arr_laodong = array('id_laodong' => new MongoId($id_laodong),
    				'id_quocgia' => $id_quocgia ? new Mongoid($id_quocgia) : '',
    				'thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
    				'thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
    				'id_nganhnghe' => $id_nganhnghe ? new MongoId($id_nganhnghe) : '',
    				'id_tinhtranglaodong' => $id_tinhtranglaodong ? new MongoId($id_tinhtranglaodong) : '',
    				'coquanlaodong' => $coquanlaodong,
    				'diachicoquanlaodong' => $diachicoquanlaodong,
                    'date_post' => new MongoDate(),
                    'id_user' => $id_user ? new MongoId($id_user) : '');
    $congdan->laodong = $arr_laodong;
    if($congdan->push_laodong()){
        echo '<tr class="items '.$id_laodong.'">';
            echo '<td>'. (isset($qg['ten']) ? $qg['ten']: '').'</td>';
            echo '<td>'. (isset($thoigianbatdau) ? $thoigianbatdau : '').'</td>';
        	echo '<td>'. (isset($thoigianketthuc) ? $thoigianketthuc : '').'</td>';
            echo '<td>'. (isset($nn['ten']) ? $nn['ten'] : '').'</td>';
            echo '<td>'. (isset($ttld['ten']) ? $ttld['ten'] : '').'</td>';
            echo '<td>'. $coquanlaodong.'</td>';
            echo '<td>'. $diachicoquanlaodong.'</td>';
            echo '<td><a href="get.xoalaodong.php?id_congdan='.$id_congdan .'&id_laodong='.$id_laodong.'" class="xoalaodong" onclick="return false;"><span class="mif-bin"></span></a></td>';
            echo '<td><a href="get.sualaodong.php?id_congdan='.$id_congdan .'&id_laodong='.$id_laodong.'" class="sualaodong" onclick="return false;"><span class="mif-pencil"></span></a></td>';
        echo '</tr>';
    } else {
    	echo 'Failed';
    }
}


?>
