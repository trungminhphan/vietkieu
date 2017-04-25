<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }

$congdan = new CongDan(); $quocgia = new QuocGia(); $trinhdo = new TrinhDo();
$coquancongtac = new CoQuanCongTac();$nganhhoc = new NganhHoc();$hinhthuchoctap = new HinhThucHocTap();

$key = isset($_POST['key']) ? $_POST['key'] : '';
$id_hoctap = isset($_POST['id_hoctap']) ? $_POST['id_hoctap'] : '';
$id_congdan = isset($_POST['id_congdan']) ? $_POST['id_congdan'] : '';
$id_quocgia = isset($_POST['id_quocgia']) ? $_POST['id_quocgia'] : '';
$thoigianbatdau = isset($_POST['thoigianbatdau']) ? $_POST['thoigianbatdau'] : '';
$thoigianketthuc = isset($_POST['thoigianketthuc']) ? $_POST['thoigianketthuc'] : '';
$id_nganhhoc = isset($_POST['id_nganhhoc']) ? $_POST['id_nganhhoc'] : '';
$id_hinhthuchoctap = isset($_POST['id_hinhthuchoctap']) ? $_POST['id_hinhthuchoctap'] : '';
$id_trinhdo = isset($_POST['id_trinhdo']) ? $_POST['id_trinhdo'] : '';
$id_coquancongtac = isset($_POST['id_coquancongtac']) ? $_POST['id_coquancongtac'] : '';

$id_user = $users->get_userid();

if($id_quocgia) { $quocgia->id = $id_quocgia; $qg = $quocgia->get_one(); }
if($id_nganhhoc) { $nganhhoc->id = $id_nganhhoc; $nh = $nganhhoc->get_one();}
if($id_hinhthuchoctap) { $hinhthuchoctap->id = $id_hinhthuchoctap; $ht = $hinhthuchoctap->get_one();}
if($id_trinhdo) { $trinhdo->id = $id_trinhdo; $td = $trinhdo->get_one(); }
if($id_coquancongtac) { $coquancongtac->id = $id_coquancongtac; $cq = $coquancongtac->get_one(); }
$congdan->id = $id_congdan; 

if($id_hoctap){
	$arr_hoctap = array('hoctap.$.id_quocgia' => new MongoId($id_quocgia),
						'hoctap.$.thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
						'hoctap.$.thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
						'hoctap.$.id_nganhhoc' => $id_nganhhoc ? new MongoId($id_nganhhoc) : '',
						'hoctap.$.id_hinhthuchoctap' => $id_hinhthuchoctap ? new MongoId($id_hinhthuchoctap) : '',
						'hoctap.$.id_trinhdo' => $id_trinhdo ? new MongoId($id_trinhdo) : '',
						'hoctap.$.id_coquancongtac' => $id_coquancongtac ? new MongoId($id_coquancongtac) : '');
	$congdan->id_hoctap = $id_hoctap;
	$congdan->hoctap = $arr_hoctap;
	if($congdan->set_hoctap()){
		echo '<tr class="items '.$id_hoctap.'">';
		echo '<td>'.(isset($qg['ten']) ? $qg['ten']: '').'</td>';
	    echo '<td>'.(isset($thoigianbatdau) ? $thoigianbatdau : '').'</td>';
	    echo '<td>'.(isset($thoigianketthuc) ? $thoigianketthuc : '').'</td>';
		echo '<td>'.(isset($nh['ten']) ? $nh['ten']: '').'</td>';
		echo '<td>'.(isset($ht['ten']) ? $ht['ten']: '').'</td>';
		echo '<td>'.(isset($td['ten']) ? $td['ten']: '').'</td>';
		echo '<td>'.(isset($cq['ten']) ? $cq['ten']: '').'</td>';
		echo '<td><a href="get.xoahoctap.php?id_congdan='.$id_congdan.'&id_hoctap='.$id_hoctap.'" class="xoahoctap" onclick="return false;"><span class="mif-bin"></span></a></td>';
		echo '<td><a href="get.suahoctap.php?id_congdan='.$id_congdan.'&id_hoctap='.$id_hoctap.'" class="suahoctap" onclick="return false;"><span class="mif-pencil"></span></a></td>';
		echo '</tr>';
	} else {
		echo 'Failed';
	}
} else {
	$id_hoctap = new MongoId();
	$arr_hoctap = array('id_hoctap' => new MongoId($id_hoctap),
						'id_quocgia' => $id_quocgia ? new MongoId($id_quocgia) : '',
						'thoigianbatdau' => $thoigianbatdau ? new MongoDate(convert_date_dd_mm_yyyy($thoigianbatdau)) : '',
						'thoigianketthuc' => $thoigianketthuc ? new MongoDate(convert_date_dd_mm_yyyy($thoigianketthuc)) : '',
						'id_nganhhoc' => $id_nganhhoc ? new MongoId($id_nganhhoc) : '',
						'id_hinhthuchoctap' => $id_hinhthuchoctap ? new MongoId($id_hinhthuchoctap) : '',
						'id_trinhdo' => $id_trinhdo ? new MongoId($id_trinhdo) : '',
						'id_coquancongtac' => $id_coquancongtac ? new MongoId($id_coquancongtac) : '',
						'date_post' => new MongoDate(),
						'id_user' => $id_user ? new MongoId($id_user) : '');
	$congdan->hoctap = $arr_hoctap;
	if($congdan->push_hoctap()){
		$cd = $congdan->get_one();
		echo '<tr class="items '.$id_hoctap.'">';
		echo '<td>'.(isset($qg['ten']) ? $qg['ten']: '').'</td>';
	    echo '<td>'.(isset($thoigianbatdau) ? $thoigianbatdau : '').'</td>';
	    echo '<td>'.(isset($thoigianketthuc) ? $thoigianketthuc : '').'</td>';
		echo '<td>'.(isset($nh['ten']) ? $nh['ten']: '').'</td>';
		echo '<td>'.(isset($ht['ten']) ? $ht['ten']: '').'</td>';
		echo '<td>'.(isset($td['ten']) ? $td['ten']: '').'</td>';
		echo '<td>'.(isset($cq['ten']) ? $cq['ten']: '').'</td>';
		echo '<td><a href="get.xoahoctap.php?id_congdan='.$id_congdan.'&id_hoctap='.$id_hoctap.'" class="xoahoctap" onclick="return false;"><span class="mif-bin"></span></a></td>';
		echo '<td><a href="get.suahoctap.php?id_congdan='.$id_congdan.'&id_hoctap='.$id_hoctap.'" class="suahoctap" onclick="return false;"><span class="mif-pencil"></span></a></td>';
		echo '</tr>';
	} else {
		echo 'Failed';
	}
}

?>