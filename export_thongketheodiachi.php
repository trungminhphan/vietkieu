<?php
function __autoload($class_name) {
    require_once('cls/class.' . strtolower($class_name) . '.php');
}
$session = new SessionManager();
$users = new Users();
require_once('inc/functions.inc.php');
require_once('inc/config.inc.php');
if(!$users->isLoggedIn()){ transfers_to('./login.php'); }
require_once('cls/PHPExcel.php');

$diachi = new DiaChi();$congdan=new CongDan();
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

if($act == 'real'){
	$congdan_list = $congdan->get_list_to_diachi_real($arr_diachi, $loaithongke);
} else if($act=='vietkieu'){
	$congdan_list = $congdan->get_list_to_diachi_vietkieu($arr_diachi, $act, $loaithongke);
} else {
	$congdan_list = $congdan->get_list_to_diachi($arr_diachi, $act, $loaithongke);
}

//Export nguoi dan di hoc tap nuoc ngoai....

if($act == 'hoctap'){
	$trinhdo = new TrinhDo();$quocgia = new QuocGia();$hinhthuchoctap = new HinhThucHocTap();$nganhhoc = new NganhHoc();
	$inputFileName = 'templates/export_hoctap.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);
	if(isset($congdan_list) && $congdan_list){
		$i=5;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
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

			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $quocgiahoctap);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $tenhinhthuchoctap);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $tennganhhoc);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $tungay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $denngay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$i, $hokhauthuongtru);
			$i++;$stt++;
		}
	}
}

//Export nguoi dan di lao dong nuoc ngoai...
if($act == 'laodong'){
	$trinhdo = new TrinhDo();$quocgia = new QuocGia();$nganhnghe = new NganhNghe();
	$tinhtranglaodong = new TinhTrangLaoDong();
	$inputFileName = 'templates/export_laodong.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);

	if(isset($congdan_list) && $congdan_list){
		$i=5;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
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

			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $tentrinhdo);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $quocgialaodong);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $tennganhnghe);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $tungay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $denngay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $tentinhtranglaodong);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$i, $hokhauthuongtru);
			$i++; $stt++;
		}
	}
}

//Export nguoi Ket hon

if($act == 'kethon'){
	$quocgia = new QuocGia();$nganhnghe = new NganhNghe();
	$inputFileName = 'templates/export_kethon.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);
	if(isset($congdan_list) && $congdan_list){
		$i=4;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
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
				$noicutruhiennay_nn = $diachi->tendiachi($cdnn['noicutruhiennay']);
				$hokhauthuongtru_nn = $diachi->tendiachi($cdnn['hokhauthuongtru']);
				if(isset($cdnn['quoctich']) && $cdnn['quoctich']){
					$quoctich_nn = $quocgia->get_quoctich($cdnn['quoctich']);	
				} else { $quoctich_nn = ''; }
				if(isset($cdnn['id_nganhnghe']) && $cdnn['id_nganhnghe']){
					$nganhnghe->id = $cdnn['id_nganhnghe']; $nn = $nganhnghe->get_one();$tennganhnghe_nn = $nn['ten'];
				} else { $tennganhnghe_nn = '';}
			} else {
				$ngaykethon = '-';$ngaykethon='-';$tennganhnghe='';$cdnn='';
				$noicutruhiennay_nn ='';$hokhauthuongtru_nn='';$noisinh_nn='';$quoctich_nn='';$tennganhnghe_nn='';
			}
			$j = $i+1;
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':A'.$j);
			$objPHPExcel->getActiveSheet()->mergeCells('H'.$i.':H'.$j);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, '');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $ngaykethon);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $quoctich);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $tennganhnghe);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $hokhauthuongtru);

			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$j, $cdnn['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$j, '');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$j, $cdnn['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$j, $cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$j, $cdnn['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$j, $noisinh_nn);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$j, $quoctich_nn);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$j, $tennganhnghe_nn);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$j, $noicutruhiennay_nn);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$j, $hokhauthuongtru_nn);
			$i+=2;$stt++;
		}
	}
}

if($act == 'dicu'){
	$quocgia = new QuocGia();$tongiao = new TonGiao();$diendicu = new DienDiDinhCu();
	$inputFileName = 'templates/export_dicu.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);
	if(isset($congdan_list) && $congdan_list){
		$i=4;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
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
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $quoctich);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $tentongiao);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $quocgiadicu);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $ngaydicu);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $tendiendicu);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$i, $hokhauthuongtru);
			$stt++;$i++;
		}
	}
}

//Export Dinh cu

if($act=='dinhcu'){
	$quocgia = new QuocGia();$tongiao=new TonGiao();
	$inputFileName = 'templates/export_dinhcu.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);

	if(isset($congdan_list) && $congdan_list){
		$i=4;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
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
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $quoctich);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $tentongiao);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $quocgiadinhcu);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $ngaynhaptich);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$i, $hokhauthuongtru);
			$i++;$stt++;
		}
	}
}
//thong ke theo so thuc
if($act == 'real' || $act=='vietkieu'){
	$quocgia = new QuocGia();$tongiao=new TonGiao();
	$inputFileName = 'templates/export_real.xlsx';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	$objPHPExcel->getProperties()->setCreator("Phan Minh Trung")
								 ->setLastModifiedBy("Phan Minh Trung")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Ket xuat du lieu");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->setActiveSheetIndex()->setCellValue('A2', $str_diachi);

	if(isset($congdan_list) && $congdan_list){
		$i=4;$stt=1;
		foreach ($congdan_list as $cd) {
			$noisinh = $diachi->tendiachi($cd['noisinh']);
			$noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
			$hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
			if(isset($cd['quoctich']) && $cd['quoctich']){
				$quoctich = $quocgia->get_quoctich($cd['quoctich']);
			} else { $quoctich = ''; }
			if(isset($cd['id_tongiao']) && $cd['id_tongiao']){
				$tongiao->id=$cd['id_tongiao']; $tg = $tongiao->get_one(); $tentongiao = $tg['ten'];
			} else { $tentongiao = ''; }
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$i, $stt);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$i, $cd['code']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$i, $cd['hoten']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$i, $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) :'');
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$i, $cd['gioitinh']);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$i, $noisinh);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$i, $quoctich);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$i, $tentongiao);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$i, $noicutruhiennay);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$i, $hokhauthuongtru);
			$i++;$stt++;
		}
	}
}
// Redirect output to a client’s web browser (Excel2007)
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="export_'.$act.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
