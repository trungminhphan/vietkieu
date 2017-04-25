<?php
require_once('header.php');
$diachi = new DiaChi();$congdan=new CongDan();$quocgia = new QuocGia(); 
$id1 = isset($_GET['id1']) ? $_GET['id1'] : '';
$id2 = isset($_GET['id2']) ? $_GET['id2'] : '';
$id3 = isset($_GET['id3']) ? $_GET['id3'] : '';
$id4 = isset($_GET['id4']) ? $_GET['id4'] : '';
$id5 = isset($_GET['id5']) ? $_GET['id5'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : 'hokhauthuongtru';
$arr_diachi = array($id1, $id2, $id3, $id4, $id5);
$str_diachi = $diachi->tendiachi($arr_diachi);
switch ($act) {
	case 'hoctap': $title = 'Danh sách Học tập'; break;
	case 'laodong': $title = 'Danh sách Lao động'; break;
	case 'kethon': $title = 'Danh sách Kết hôn'; break;
	case 'dicu': $title = 'Danh sách Di cư'; break;
	case 'dinhcu': $title = 'Danh sách Định cư'; break;
	default: $title = ''; break;
}
if($act == 'real'){
	$congdan_list = $congdan->get_list_to_diachi_real($arr_diachi, $loaithongke);
} else if($act=='vietkieu'){
	$congdan_list = $congdan->get_list_to_diachi_vietkieu($arr_diachi, $loaithongke);
} else {
	$congdan_list = $congdan->get_list_to_diachi($arr_diachi, $act, $loaithongke);
}
?>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<h1><a href="thongketheodiachi.php?id_quocgia=<?php echo $id1; ?>&submit=OK" class="nav-button transform"><span></span></a>&nbsp;Chi tiết thống kê theo địa chỉ</h1>
<div class="align-center">
	<?php echo '<h2 class="fg-red">' .$title . '</h2>'; ?>
</div>
<div class="align-right">
	<?php echo '<h4>' .$str_diachi . ' <a href="export_thongketheodiachi.php?'.$_SERVER['QUERY_STRING'].'"><span class="mif-file-excel"></span></a></h4>'; ?>
</div>
<!-- --- Học tập ---- -->
<?php if($act == 'hoctap') : ?>
<table class="table striped hovered border bordered datatable" data-role="datatable">
<thead>
<tr>
	<th rowspan="2">STT</th>
	<th rowspan="2">ID</th>
	<th rowspan="2" width="150">Họ tên</th>
	<th rowspan="2">Ngày sinh</th>
	<th rowspan="2">Giới tính</th>
	<!--<th rowspan="2">Nơi sinh</th>-->
	<th rowspan="2">Trình độ trước khi đi du học</th>
	<th rowspan="2">Quốc gia du học</th>
	<th rowspan="2">Hình thức du học</th>
	<th rowspan="2">Chuyên ngành</th>
	<th colspan="2">Thời gian học</th>
	<!--<th rowspan="2">Nơi cư trú hiện nay</th>-->
</tr>
<tr>
	<th>Từ ngày</th>
	<th>Đến ngày</th>
</tr>
</thead>
<tbody>
<?php
$trinhdo = new TrinhDo();$quocgia = new QuocGia();$hinhthuchoctap = new HinhThucHocTap();
$nganhhoc = new NganhHoc();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		$noisinh = $diachi->tendiachi($cd['noisinh']);
		$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
		if(isset($cd['id_trinhdo']) && $cd['id_trinhdo']){
			$trinhdo->id = $cd['id_trinhdo']; $td = $trinhdo->get_one();$tentrinhdo = $td['ten'] ? $td['ten'] : '';
		} else { $tentrinhdo = '';}
		if(isset($cd['hoctap']) && $cd['hoctap']){
			if(isset($cd['hoctap'][0]['id_quocgia']) && $cd['hoctap'][0]['id_quocgia']){
				$quocgia->id = $cd['hoctap'][0]['id_quocgia'];$qg = $quocgia->get_one();$quocgiahoctap = $qg['ten'];
			} else { $quocgialaodong = ''; }
			if(isset($cd['hoctap'][0]['id_hinhthuchoctap']) && $cd['hoctap'][0]['id_hinhthuchoctap']){
				$hinhthuchoctap->id = $cd['hoctap'][0]['id_hinhthuchoctap'];$htht = $hinhthuchoctap->get_one();$tenhinhthuchoctap = $htht['ten'];
			} else { $tenhinhthuchoctap = ''; }
			if(isset($cd['hoctap'][0]['id_nganhhoc']) && $cd['hoctap'][0]['id_nganhhoc']){
				$nganhhoc->id = $cd['hoctap'][0]['id_nganhhoc']; $nh = $nganhhoc->get_one();	$tennganhhoc = $nh['ten']; 
			} else { $tennganhhoc = ''; }
			if(isset($cd['hoctap'][0]['thoigianbatdau']) && $cd['hoctap'][0]['thoigianbatdau']){
				$tungay = date("d/m/Y", $cd['hoctap'][0]['thoigianbatdau']->sec);
			} else { $tungay = ''; }
			if(isset($cd['hoctap'][0]['thoigianketthuc']) && $cd['hoctap'][0]['thoigianketthuc']){
				$denngay = date("d/m/Y", $cd['hoctap'][0]['thoigianketthuc']->sec);
			} else { $denngay = ''; }
		} else {
			$tungay='';$denngay='';$quocgiahoctap='';$tenhinhthuchoctap='';$tennganhhoc='';
		}

		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		//echo '<td>'.$noisinh.'</td>';
		echo '<td>'.$tentrinhdo.'</td>';
		echo '<td>'.$quocgiahoctap.'</td>';
		echo '<td>'.$tenhinhthuchoctap.'</td>';
		echo '<td>'.$tennganhhoc.'</td>';
		echo '<td>'.$tungay.'</td>';
		echo '<td>'.$denngay.'</td>';
		//echo '<td>'.$noicutruhiennay.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>

<!-- --- Lao động ---- -->
<?php if($act == 'laodong') : ?>
<table class="table striped hovered border bordered datatable"  data-role="datatable">
<thead>
<tr>
	<th rowspan="2">STT</th>
	<th rowspan="2">ID</th>
	<th rowspan="2" width="230">Họ tên</th>
	<th rowspan="2">Ngày sinh</th>
	<th rowspan="2">Giới tính</th>
	<!--<th rowspan="2">Nơi sinh</th>-->
	<th rowspan="2">Trình độ văn hoá/chuyên môn hiện nay</th>
	<th rowspan="2">Quốc gia</th>
	<th rowspan="2">Ngành nghề</th>
	<th colspan="2">Thời gian Lao động</th>
	<th rowspan="2">Tình trạng lao động hiện nay</th>
	<!--<th rowspan="2">Nơi cư trú hiện nay</th>-->
</tr>
<tr>
	<th>Từ ngày</th>
	<th>Đến ngày</th>
</tr>
</thead>
<tbody>
<?php
$trinhdo = new TrinhDo();$quocgia = new QuocGia();$nganhnghe = new NganhNghe();
$tinhtranglaodong = new TinhTrangLaoDong();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		$noisinh = $diachi->tendiachi($cd['noisinh']);
		$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
		if(isset($cd['id_trinhdo']) && $cd['id_trinhdo']){
			$trinhdo->id = $cd['id_trinhdo']; $td = $trinhdo->get_one();$tentrinhdo = $td['ten'] ? $td['ten'] : '';
		} else { $tentrinhdo = '';}
		if(isset($cd['laodong']) && $cd['laodong']){
			if(isset($cd['laodong'][0]['id_quocgia']) && $cd['laodong'][0]['id_quocgia']){
				$quocgia->id = $cd['laodong'][0]['id_quocgia'];$qg = $quocgia->get_one();$quocgialaodong = $qg['ten'];
			} else { $quocgialaodong = ''; }
			if(isset($cd['laodong'][0]['id_nganhnghe']) && $cd['laodong'][0]['id_nganhnghe']){
				$nganhnghe->id = $cd['laodong'][0]['id_nganhnghe'];$nn = $nganhnghe->get_one();$tennganhnghe = $nn['ten'];
			} else { $tennganhnghe = '';}
			if(isset($cd['laodong'][0]['tungay']) && $cd['laodong'][0]['tungay']){
				$tungay = date("d/m/Y", $cd['laodong'][0]['tungay']->sec);
			} else { $tungay = ''; }
			if(isset($cd['laodong'][0]['denngay']) && $cd['laodong'][0]['denngay']){
				$denngay = date("d/m/Y", $cd['laodong'][0]['denngay']->sec);
			} else { $denngay = ''; }
			if(isset($cd['laodong'][0]['id_tinhtranglaodong']) && $cd['laodong'][0]['id_tinhtranglaodong']){
				$tinhtranglaodong->id = $cd['laodong'][0]['id_tinhtranglaodong'];$tt = $tinhtranglaodong->get_one();
				$tentinhtranglaodong = $tt['ten'];
			} else { $tentinhtranglaodong = '';	}
		} else {
			$quocgialaodong = '';$tennganhnghe='';$tungay='';$denngay='';$tentinhtranglaodong='';
		}
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		//echo '<td>'.$noisinh.'</td>';
		echo '<td>'.$tentrinhdo.'</td>';
		echo '<td>'.$quocgialaodong.'</td>';
		echo '<td>'.$tennganhnghe.'</td>';
		echo '<td>'.$tungay.'</td>';
		echo '<td>'.$denngay.'</td>';
		echo '<td>'.$tentinhtranglaodong.'</td>';
		//echo '<td>'.$noicutruhiennay.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>

<!-- --- kết hôn ---- -->
<?php if($act == 'kethon') : ?>
<table class="table hovered border bordered datatable" data-role="datatable">
<thead>
<tr>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên người Việt Nam</th>
	<th>Họ tên người Nước ngoài</th>
	<th>Ngày sinh</th>
	<th>Giới tính</th>
	<th>Nơi sinh</th>
	<th>Ngày kết hôn</th>
	<th>Quốc tịch</th>
	<th>Nghề nghiệp</th>
	<th>Nơi cư trú hiện nay</th>
</th>
</thead>
<tbody>
<?php
$quocgia = new QuocGia();$nganhnghe = new NganhNghe();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		$noisinh = $diachi->tendiachi($cd['noisinh']);
		$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
		if(isset($cd['quoctich']) && $cd['quoctich']){
			$quoctich = $quocgia->get_quoctich($cd['quoctich']);
		} else {
			$quoctich = '';
		}
		if(isset($cd['id_nganhnghe']) && $cd['id_nganhnghe']){
			$nganhnghe->id = $cd['id_nganhnghe']; $nn = $nganhnghe->get_one();$tennganhnghe = $nn['ten'];
		}else {$tennganhnghe='';}
		if(isset($cd['kethon']) && $cd['kethon']){
			$ngaykethon = $cd['kethon'][0]['ngaykethon'] ? date("d/m/Y", $cd['kethon'][0]['ngaykethon']->sec) : '';
			$congdan->id = $cd['kethon'][0]['id_congdannuocngoai'];$cdnn = $congdan->get_one();
			$noisinh_nn = $diachi->tendiachi($cdnn['noisinh']);
		} else {
			$ngaykethon = '-';$ngaykethon='-';$tennganhnghe='';$cdnn='';
		}
		echo '<tr>';
		echo '<td rowspan="2">'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.$noisinh.'</td>';
		echo '<td rowspan="2">'.$ngaykethon.'</td>';
		echo '<td>'.$quoctich.'</td>';
		echo '<td>'.$tennganhnghe.'</td>';
		echo '<td>'.$noicutruhiennay.'</td>';
		echo '</tr>';

		echo '<tr>';
		echo '<td>'.$cdnn['code'].'</td>';
		echo '<td></td>';
		echo '<td><a href="congdan.php?id='.$cdnn['_id'].'">'.$cdnn['hoten'].'</a></td>';
		echo '<td>'.($cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cdnn['gioitinh'].'</td>';
		echo '<td>'.$noisinh_nn.'</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';


		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>

<!-- --- Di cư ---- -->
<?php if($act == 'dicu') : ?>
<table class="table striped hovered datatable" data-role="datatable">
<thead>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên</th>
	<th>Ngày sinh</th>
	<th>Giới tính</th>
	<th>Quốc tịch</th>
	<th>Tôn giáo</th>
	<th>Quốc gia di cư</th>
	<th>Ngày di cư</th>
	<th>Diện di cư</th>
</thead>
<tbody>
<?php
$quocgia = new QuocGia();$tongiao = new TonGiao();$diendicu = new DienDiDinhCu();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		if(isset($cd['quoctich']) && $cd['quoctich']){
			$quoctich = $quocgia->get_quoctich($cd['quoctich']);
		} else { $quoctich = ''; }
		if(isset($cd['id_tongiao']) && $cd['id_tongiao']){
			$tongiao->id=$cd['id_tongiao']; $tg = $tongiao->get_one(); $tentongiao = $tg['ten'];
		} else { $tentongiao = ''; }
		if(isset($cd['dicu']) && $cd['dicu']){
			if($cd['dicu'][0]['id_quocgia']){
				$quocgia->id = $cd['dicu'][0]['id_quocgia']; $qg = $quocgia->get_one();$quocgiadicu=$qg['ten'];
			} else { $quocgiadicu = ''; }
			if($cd['dicu'][0]['ngaydicu']){
				$ngaydicu = date("d/m/Y", $cd['dicu'][0]['ngaydicu']->sec);
			} else { $ngaydicu == '';}
			if(isset($cd['dicu'][0]['id_diendicu']) && $cd['dicu'][0]['id_diendicu']){
				$diendicu->id = $cd['dicu'][0]['id_diendicu']; $ddc = $diendicu->get_one(); $tendiendicu=$ddc['ten'];
			} else { $tendiendicu = ''; }
		} else {
			$ngaydicu = '';	$quocgiadicu='';$tendiendicu='';
		}
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.$quoctich.'</td>';
		echo '<td>'.$tentongiao.'</td>';
		echo '<td>'.$quocgiadicu.'</td>';
		echo '<td>'.$ngaydicu.'</td>';
		echo '<td>'.$tendiendicu.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>

<!-- --- Định cư ---- -->
<?php if($act == 'dinhcu') : ?>
<table class="table striped hovered datatable" data-role="datatable">
<thead>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên</th>
	<th>Ngày sinh</th>
	<th>Giới tính</th>
	<th>Quốc tịch</th>
	<th>Tôn giáo</th>
	<th>Quốc gia định cư</th>
	<th>Ngày nhập tịch</th>
</thead>
<tbody>
<?php
$quocgia = new QuocGia();$tongiao=new TonGiao();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		if(isset($cd['quoctich']) && $cd['quoctich']){
			$quoctich = $quocgia->get_quoctich($cd['quoctich']);
		} else { $quoctich = ''; }
		if(isset($cd['id_tongiao']) && $cd['id_tongiao']){
			$tongiao->id=$cd['id_tongiao']; $tg = $tongiao->get_one(); $tentongiao = $tg['ten'];
		} else { $tentongiao = ''; }
		if(isset($cd['dinhcu']) && $cd['dinhcu']){
			if($cd['dinhcu'][0]['id_quocgia']){
				$quocgia->id = $cd['dicu'][0]['id_quocgia']; $qg = $quocgia->get_one();$quocgiadinhcu=$qg['ten'];
			} else { $quocgiadinhcu = ''; }
			if(isset($cd['dinhcu'][0]['ngaynhaptich']) && $cd['dinhcu'][0]['ngaynhaptich']){
				$ngaynhaptich = date("d/m/Y", $cd['dinhcu'][0]['ngaynhaptich']->sec);
			} else { $ngaynhaptich == '';}
		} else {
			$ngaynhaptich = '';	$quocgiadinhcu='';
		}
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.$quoctich.'</td>';
		echo '<td>'.$tentongiao.'</td>';
		echo '<td>'.$quocgiadinhcu.'</td>';
		echo '<td>'.$ngaynhaptich.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>
<!------ Viet kieu ---- -->
<?php if($act == 'vietkieu') : ?>
<table class="table striped hovered datatable" data-role="datatable">
<thead>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên</th>
	<th>Ngày sinh</th>
	<th>Giới tính</th>
	<th>Quốc tịch</th>
	<th>Tôn giáo</th>
</thead>
<tbody>
<?php
$quocgia = new QuocGia();$tongiao=new TonGiao();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		if(isset($cd['quoctich']) && $cd['quoctich']){
			$quoctich = $quocgia->get_quoctich($cd['quoctich']);
		} else { $quoctich = ''; }
		if(isset($cd['id_tongiao']) && $cd['id_tongiao']){
			$tongiao->id=$cd['id_tongiao']; $tg = $tongiao->get_one(); $tentongiao = $tg['ten'];
		} else { $tentongiao = ''; }
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.$quoctich.'</td>';
		echo '<td>'.$tentongiao.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>
<!-- --- So thuc --------- -->
<?php if($act == 'real') : ?>
<table class="table striped hovered datatable" data-role="datatable">
<thead>
	<th>STT</th>
	<th>ID</th>
	<th>Họ tên</th>
	<th>Ngày sinh</th>
	<th>Giới tính</th>
	<th>Quốc tịch</th>
	<th>Tôn giáo</th>
</thead>
<tbody>
<?php
$quocgia = new QuocGia();$tongiao=new TonGiao();
if(isset($congdan_list) && $congdan_list){
	$i=1;
	foreach ($congdan_list as $cd) {
		if(isset($cd['quoctich']) && $cd['quoctich']){
			$quoctich = $quocgia->get_quoctich($cd['quoctich']);
		} else { $quoctich = ''; }
		if(isset($cd['id_tongiao']) && $cd['id_tongiao']){
			$tongiao->id=$cd['id_tongiao']; $tg = $tongiao->get_one(); $tentongiao = $tg['ten'];
		} else { $tentongiao = ''; }
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'">'.$cd['hoten'].'</a></td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'').'</td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.$quoctich.'</td>';
		echo '<td>'.$tentongiao.'</td>';
		echo '</tr>';
		$i++;
	}
}
?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>