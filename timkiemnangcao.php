<?php require_once('header.php');
$loaitimkiem = isset($_GET['loaitimkiem']) ? $_GET['loaitimkiem'] : 'hoctap';
$congdan = new CongDan();
$gioitinh = '';$diachi = new DiaChi();$diachi_list = $diachi->get_all_list();
$query = array();$title = 'Tìm kiếm Công dân Học tập';
if(isset($_GET['submit'])){
	$hoten = isset($_GET['hoten']) ? $_GET['hoten'] : '';
	$gioitinh = isset($_GET['gioitinh']) ? $_GET['gioitinh'] : '';
	$ngaysinh = isset($_GET['ngaysinh']) ? $_GET['ngaysinh'] : '';
	$noisinh1 = isset($_GET['noisinh1']) ? $_GET['noisinh1'] : '';
	$noisinh2 = isset($_GET['noisinh2']) ? $_GET['noisinh2'] : '';
	$noisinh3 = isset($_GET['noisinh3']) ? $_GET['noisinh3'] : '';
	$noisinh4 = isset($_GET['noisinh4']) ? $_GET['noisinh4'] : '';
	$noisinh5 = isset($_GET['noisinh5']) ? $_GET['noisinh5'] : '';
	$noisinh6 = isset($_GET['noisinh6']) ? $_GET['noisinh6'] : '';
	
	if($noisinh1)  array_push($query, array('noisinh.0' => new MongoId($noisinh1)));
	if($noisinh2)  array_push($query, array('noisinh.1' => new MongoId($noisinh2)));
	if($noisinh3)  array_push($query, array('noisinh.2' => new MongoId($noisinh3)));
	if($noisinh4)  array_push($query, array('noisinh.3' => new MongoId($noisinh4)));
	if($noisinh5)  array_push($query, array('noisinh.4' => new MongoId($noisinh5)));
	if($noisinh6)  array_push($query, array('noisinh.5' => $noisinh6));                   

	if($hoten) array_push($query, array('hoten' => new MongoRegex('/'.$hoten.'/i')));
	if($gioitinh) array_push($query, array('gioitinh' => $gioitinh));
	if($ngaysinh) array_push($query, array('ngaysinh' => new MongoDate(convert_date_yyyy_mm_dd($ngaysinh))));
	if($loaitimkiem == 'hoctap'){
        $title = 'Tìm kiếm Công dân Học tập';
		$id_trinhdo = isset($_GET['id_trinhdo']) ? $_GET['id_trinhdo'] : '';
		$id_nganhhoc = isset($_GET['id_nganhhoc']) ? $_GET['id_nganhhoc'] : '';
        $id_hinhthuchoctap = isset($_GET['id_hinhthuchoctap']) ? $_GET['id_hinhthuchoctap'] : '';
		$id_quocgia = isset($_GET['id_quocgia']) ? $_GET['id_quocgia'] : '';
		$id_trinhdos = isset($_GET['id_trinhdos']) ? $_GET['id_trinhdos'] : '';
		$id_coquancongtac = isset($_GET['id_coquancongtac']) ? $_GET['id_coquancongtac'] : '';

		if($id_trinhdo) array_push($query, array('id_trinhdo' => new MongoId($id_trinhdo)));
		if($id_nganhhoc) array_push($query, array('hoctap.id_nganhhoc' => new MongoId($id_nganhhoc)));
		if($id_quocgia) array_push($query, array('hoctap.id_quocgia' => new MongoId($id_quocgia)));
		if($id_trinhdos) array_push($query, array('hoctap.id_trinhdo' => new MongoId($id_trinhdos)));
        if($id_hinhthuchoctap) array_push($query, array('hoctap.id_hinhthuchoctap' => new MongoId($id_hinhthuchoctap)));
		if($id_coquancongtac) array_push($query, array('hoctap.id_coquancongtac' => new MongoId($id_coquancongtac)));
        array_push($query, array('hoctap.id_hoctap' => array('$exists' => true)));
	}

    if($loaitimkiem == 'laodong'){
        $title = 'Tìm kiếm Công dân Lao động';
        $id_trinhdo_ld = isset($_GET['id_trinhdo_ld']) ? $_GET['id_trinhdo_ld'] : '';
        $id_quocgia_ld = isset($_GET['id_quocgia_ld']) ? $_GET['id_quocgia_ld'] : '';
        $id_nganhnghe = isset($_GET['id_nganhnghe']) ? $_GET['id_nganhnghe'] : '';
        $id_tinhtranglaodong = isset($_GET['id_tinhtranglaodong']) ? $_GET['id_tinhtranglaodong'] : '';

        if($id_trinhdo_ld) array_push($query, array('id_trinhdo' => new MongoId($id_trinhdo_ld)));
        if($id_quocgia_ld) array_push($query, array('laodong.id_quocgia' => new MongoId($id_quocgia_ld)));
        if($id_nganhnghe) array_push($query, array('laodong.id_nganhnghe' => new MongoId($id_nganhnghe)));
        if($id_tinhtranglaodong) array_push($query, array('laodong.id_tinhtranglaodong' => new MongoId($id_tinhtranglaodong)));
        array_push($query, array('laodong.id_laodong' => array('$exists' => true)));
    }

    if($loaitimkiem == 'kethon'){
        $title = 'Tìm kiếm Công dân Kết hôn';
        $ngaykethon = isset($_GET['ngaykethon']) ? $_GET['ngaykethon'] : '';
        //$id_quoctich_kh = isset($_GET['id_quoctich_kh']) ? $_GET['id_quoctich_kh'] : '';
        $id_nghenghiep_kh = isset($_GET['id_nghenghiep_kh']) ? $_GET['id_nghenghiep_kh'] : '';
        if($ngaykethon) array_push($query, array('kethon.ngaykethon' => new MongoDate(convert_date_yyyy_mm_dd($ngaykethon))));
        if($id_nghenghiep_kh) array_push($query, array('id_nganhnghe' => new MongoId($id_nghenghiep_kh)));
        //if($id_quoctich_kh) array_push($query, array('quoctich' => new MongoId($id_quoctich_kh)));      
        array_push($query, array('quoctich' => new MongoId('543b14b65c1e8824048b456a')));      
        array_push($query, array('kethon.id_kethon' => array('$exists' => true)));
        //array_push($query, array('quoctich' => array('$ne' => new MongoId('543b14b65c1e8824048b456a'))));
    }

    if($loaitimkiem == 'dicu'){
        $title = 'Tìm kiếm Công dân Di cư';
        $id_quoctich_dc = isset($_GET['id_quoctich_dc']) ? $_GET['id_quoctich_dc'] : '';
        $id_tongiao_dc = isset($_GET['id_tongiao_dc']) ? $_GET['id_tongiao_dc'] : '';
        $ngaydicu = isset($_GET['ngaydicu']) ? $_GET['ngaydicu'] : '';
        $id_quocgia_dc = isset($_GET['id_quocgia_dc']) ? $_GET['id_quocgia_dc'] : '';
        $id_diendicu = isset($_GET['id_diendicu']) ? $_GET['id_diendicu'] : '';

        if($id_quoctich_dc) array_push($query, array('quoctich' => new MongoId($id_quoctich_dc)));
        if($id_tongiao_dc) array_push($query, array('id_tongiao' => new MongoId($id_tongiao_dc)));
        if($ngaydicu) array_push($query, array('dicu.ngaydicu' => new MongoDate(convert_date_yyyy_mm_dd($ngaydicu))));
        if($id_quocgia_dc) array_push($query, array('dicu.id_quocgia' => new MongoId($id_quocgia_dc)));
        if($id_diendicu) array_push($query, array('dicu.id_diendicu' => new MongoId($id_diendicu)));
        array_push($query, array('dicu.id_dicu' => array('$exists' => true)));
    }

    if($loaitimkiem == 'dinhcu'){
        $title = 'Tìm kiếm Công dân Định cư';
        $id_quocgia_dic = isset($_GET['id_quocgia_dic']) ? $_GET['id_quocgia_dic'] : '';
        $ngaynhaptich = isset($_GET['ngaynhaptich']) ? $_GET['ngaynhaptich'] : '';
        if($id_quocgia_dic) array_push($query, array('dinhcu.id_quocgia' => new MongoId($id_quocgia_dic)));
        if($ngaynhaptich) array_push($query, array('dinhcu.ngaynhaptich' => new MongoDate(convert_date_yyyy_mm_dd($ngaynhaptich))));
        array_push($query, array('dinhcu.id_dinhcu' => array('$exists' => true)));
    }


	if(count($query) > 0 ) $condition = array('$and' => $query);
	else $condition = array();
	$congdan_list = $congdan->get_list_condition($condition);
}
?>
<script type="text/javascript" src="js/timkiemnangcao.js"></script>
<script type="text/javascript" src="js/jquery.inputmask.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		select2_all_placeholder();hide_all();
		$("#ngaysinh").inputmask();$("#ngaykethon").inputmask();$("#ngaydicu").inputmask();$("#ngaynhaptich").inputmask();
        $("#" + "<?php echo $loaitimkiem; ?>").show();
        $(".loaitimkiem").click(function(){
            hide_all(); $("#" + $(this).val()).show();
            if($(this).val() == 'hoctap') $("#title_timkiem").html("<h2>Tìm kiếm Công dân Học tập</h2>");
            if($(this).val() == 'laodong') $("#title_timkiem").html("<h2>Tìm kiếm Công dân Lao động</h2>");
            if($(this).val() == 'kethon') $("#title_timkiem").html("<h2>Tìm kiếm Công dân Kết hôn</h2>");
            if($(this).val() == 'dicu') $("#title_timkiem").html("<h2>Tìm kiếm Công dân Di cư</h2>");
            if($(this).val() == 'dinhcu') $("#title_timkiem").html("<h2>Tìm kiếm Công dân Định cư</h2>");
        });
	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp; Tìm kiếm nâng cao</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="timkiemnangcao">
<label class="input-control radio">
    <input type="radio" name="loaitimkiem" class="loaitimkiem" value="hoctap" <?php echo $loaitimkiem=='hoctap' ? 'checked' : ''; ?> />
    <span class="check"></span>
    <span class="caption">Học tập</span>
</label>
<label class="input-control radio">
    <input type="radio" name="loaitimkiem" class="loaitimkiem" value="laodong" <?php echo $loaitimkiem=='laodong' ? 'checked' : ''; ?> />
    <span class="check"></span>
    <span class="caption">Lao động</span>
</label>
<label class="input-control radio">
    <input type="radio" name="loaitimkiem" class="loaitimkiem" value="kethon" <?php echo $loaitimkiem=='kethon' ? 'checked' : ''; ?> />
    <span class="check"></span>
    <span class="caption">Kết hôn</span>
</label>
<label class="input-control radio">
    <input type="radio" name="loaitimkiem" class="loaitimkiem" value="dicu" <?php echo $loaitimkiem=='dicu' ? 'checked' : ''; ?> />
    <span class="check"></span>
    <span class="caption">Di cư</span>
</label>
<label class="input-control radio">
    <input type="radio" name="loaitimkiem" class="loaitimkiem" value="dinhcu" <?php echo $loaitimkiem=='dinhcu' ? 'checked' : ''; ?>/>
    <span class="check"></span>
    <span class="caption">Định cư</span>
</label>
<hr />
<!--- form hoc tap----------------- -->
<div class="grid">
	<div class="row cells12">
		<div class="cell colspan12 align-center" id="title_timkiem">
			<h2><?php echo $title; ?></h2>
		</div>
	</div>
	<div class="row cells12">
		<div class="cell colspan3 align-left">
            <div class="place-left padding-top-15">Họ tên: </div>
            <div class="input-control text">
                <input type="text" name="hoten" id="hoten" value="<?php echo isset($hoten) ? $hoten : ''; ?>" />
            </div>
        </div>
        <div class="cell colspan3 align-left">
            <div class="place-left padding-top-15">Giới tính: </div>
            <div class="input-control select">
                <select name="gioitinh" id="gioitinh">
                	<option value="">Chọn giới tính</option>
                    <option value="Nam" <?php echo $gioitinh == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo $gioitinh == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="cell colspan4 align-left">
            <div class="place-left padding-top-15">Ngày sinh: </div>
            <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="ngaysinh" id="ngaysinh" placeholder="Ngày sinh" value="<?php echo isset($ngaysinh) ? $ngaysinh : ''; ?>" data-inputmask="'alias': 'date'" />
                <button class="button"><span class="mif-calendar"></span></button>
            </div>
        </div>
	</div>
	<div class="row cells12">
	    <div class="cell colspan2 padding-top-10">Nơi sinh: </div>
	    <div class="cell colspan2 align-left input-control select">
	        <select name="noisinh1" id="noisinh1" class="diachi"  data-allow-clear="true">
	            <option value="">Quốc gia</option>
	            <?php
	            if($diachi_list){
	                foreach ($diachi_list as $a1) {
	                    echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
	                }
	            }
	            ?>
	        </select>
	    </div>
	    <div class="cell colspan2 align-left input-control select">
	        <select name="noisinh2" id="noisinh2" class="diachi" data-allow-clear="true">
	            <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
	        </select>
	    </div>
	    <div class="cell colspan2 align-left input-control select">
	        <select name="noisinh3" id="noisinh3" class="diachi" data-allow-clear="true">
	            <option value="">Huyện/TP</option>
	        </select>
	    </div>
	    <div class="cell colspan2 align-left input-control select">
	        <select name="noisinh4" id="noisinh4" class="diachi" data-allow-clear="true">
	            <option value="">Thị xã, phường, xã</option>
	        </select>
	    </div>
	</div>
	<div class="row cells12">
	    <div class="cell colspan2 padding-top-10"></div>
	    <div class="cell colspan2 align-left input-control select">
	        <select name="noisinh5" id="noisinh5" class="diachi" data-allow-clear="true">
	            <option value="">Ấp, khóm</option>
	        </select>
	    </div>
	    <div class="cell colspan6 align-left input-control text">
	        <input type="text" name="noisinh6" id="noisinh6" placeholder="số nhà, đường,..." />
	    </div>
	</div>
    <!----- hoc tap -- -->
    <div id="hoctap">
    	<div class="row cells12">
    		<div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Trình độ: </div>
                <div class="input-control text">
                    <select name="id_trinhdo" id="id_trinhdo" class="diachi" data-allow-clear="true">
                        <option value="">Trình độ học vấn</option>
                        <?php
                        $trinhdo = new TrinhDo();
                        $trinhdo_list = $trinhdo->get_all_list();
                        if($trinhdo_list){
                            foreach ($trinhdo_list as $td) {
                                echo '<option value="'.$td['_id'].'"'.($td['_id']==$id_trinhdo ? ' selected' : '').'>'.$td['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan5 align-left">
                <div class="place-left padding-top-15">Ngành học: </div>
                <div class="input-control text" style="width:80%;">
                    <select name="id_nganhhoc" id="id_nganhhoc" class="diachi" data-allow-clear="true">
                        <option value="">Ngành học</option>
                        <?php
                        $nganhhoc = new NganhHoc();
                        $nganhhoc_list = $nganhhoc->get_all_list();
                        if($nganhhoc_list){
                            foreach ($nganhhoc_list as $nh) {
                                echo '<option value="'.$nh['_id'].'"'.($nh['_id'] == $id_nganhhoc ? ' selected' : '').'>'.$nh['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Quốc Gia Du Học: </div>
                <div class="input-control text">
                    <select name="id_quocgia" id="id_quocgia" class="diachi" data-allow-clear="true">
                        <option value="">Ngành học</option>
                        <?php
                        $quocgia = new QuocGia();
                        $quocgia_list = $quocgia->get_all_list();
                        if($quocgia_list){
                            foreach ($quocgia_list as $qg) {
                                echo '<option value="'.$qg['_id'].'"'.($qg['_id'] == $id_quocgia ? ' selected' : '').'>'.$qg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
    	</div>
    	<div class="row cells12">
    		<div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Bằng cấp sau khi học: </div>
                <div class="input-control text">
                    <select name="id_trinhdos" id="id_trinhdos" class="diachi" data-allow-clear="true">
                        <option value="">Bằng cấp</option>
                        <?php
                        if($trinhdo_list){
                            foreach ($trinhdo_list as $td) {
                                echo '<option value="'.$td['_id'].'"'.($td['_id'] == $id_trinhdos ? ' selected' : '').'>'.$td['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Hình thức học tập: </div>
                <div class="input-control text">
                    <select name="id_hinhthuchoctap" id="id_hinhthuchoctap" class="diachi" data-allow-clear="true">
                        <option value="">Hình thức học tập</option>
                        <?php
                        $hinhthuchoctap = new HinhThucHocTap();
                        $hinhthuchoctap_list = $hinhthuchoctap->get_all_list();
                        if($hinhthuchoctap_list){
                            foreach ($hinhthuchoctap_list as $htht) {
                                echo '<option value="'.$htht['_id'].'"'.($htht['_id'] == $id_hinhthuchoctap ? ' selected' : '').'>'.$htht['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Cơ quan công tác: </div>
                <div class="input-control text" style="width:60%;">
                    <select name="id_coquancongtac" id="id_coquancongtac" class="diachi" data-allow-clear="true">
                        <option value="">Cơ quan công tác</option>
                        <?php
                        $coquancongtac = new CoQuanCongTac();
                        $coquancongtac_list = $coquancongtac->get_all_list();
                        if($coquancongtac_list){
                            foreach ($coquancongtac_list as $cq) {
                                echo '<option value="'.$cq['_id'].'"'.($cq['_id'] == $id_coquancongtac ? ' selected' : '').'>'.$cq['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
	</div>
    <!--- end hoc tap - -->
    <!-- lao dong --- -->
    <div id="laodong">
        <div class="row cells12">
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Trình độ: </div>
                <div class="input-control text">
                    <select name="id_trinhdo_ld" id="id_trinhdo_ld" class="diachi" data-allow-clear="true">
                        <option value="">Trình độ học vấn</option>
                        <?php
                        if($trinhdo_list){
                            foreach ($trinhdo_list as $td) {
                                echo '<option value="'.$td['_id'].'"'.($td['_id']==$id_trinhdo_ld ? ' selected' : '').'>'.$td['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Quốc Gia Lao động: </div>
                <div class="input-control text">
                    <select name="id_quocgia_ld" id="id_quocgia_ld" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($quocgia_list){
                            foreach ($quocgia_list as $qg) {
                                echo '<option value="'.$qg['_id'].'"'.($qg['_id'] == $id_quocgia_ld ? ' selected' : '').'>'.$qg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan5 align-left">
                <div class="place-left padding-top-15">Ngành nghề: </div>
                <div class="input-control text">
                    <select name="id_nganhnghe" id="id_nganhnghe" class="diachi" data-allow-clear="true">
                        <option value="">Ngành nghề</option>
                        <?php
                        $nganhnghe = new NganhNghe();
                        $nganhnghe_list = $nganhnghe->get_all_list();
                        if($nganhnghe_list){
                            foreach ($nganhnghe_list as $nn) {
                                echo '<option value="'.$nn['_id'].'"'.($nn['_id'] == $id_nganhnghe ? ' selected' : '').'>'.$nn['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan6 align-left">
                <div class="place-left padding-top-15">Tình trạng lao động hiện nay: </div>
                <div class="input-control text">
                    <select name="id_tinhtranglaodong" id="id_tinhtranglaodong" class="diachi" data-allow-clear="true">
                        <option value="">Tình trạng lao động</option>
                        <?php
                        $tinhtranglaodong = new TinhTrangLaoDong();
                        $tinhtranglaodong_list = $tinhtranglaodong->get_all_list();
                        if($tinhtranglaodong_list){
                            foreach ($tinhtranglaodong_list as $tt) {
                                echo '<option value="'.$tt['_id'].'"'.($tt['_id'] == $id_tinhtranglaodong ? ' selected' : '').'>'.$tt['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!------ end lao dong --- -->
    <!------------------------------ KET HON ------------------- -->
    <div id="kethon">
        <div class="row cells12">
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Ngày kết hôn: </div>
                <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                    <input type="text" name="ngaykethon" id="ngaykethon" placeholder="Ngày kết hôn" value="<?php echo isset($ngaykethon) ? $ngaykethon : ''; ?>" data-inputmask="'alias': 'date'" />
                    <button class="button"><span class="mif-calendar"></span></button>
                </div>
            </div>
            <div class="cell colspan6 align-left">
                <div class="place-left padding-top-15">Nghề nghiệp: </div>
                <div class="input-control text">
                    <select name="id_nghenghiep_kh" id="id_nghenghiep_kh" class="diachi" data-allow-clear="true">
                        <option value="">Ngành nghề</option>
                        <?php
                        if($nganhnghe_list){
                            foreach ($nganhnghe_list as $nn) {
                                echo '<option value="'.$nn['_id'].'"'.($nn['_id'] == $id_nghenghiep_kh ? ' selected' : '').'>'.$nn['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------ END KET HON ------------------- -->
    <!------------------------------ DI CU ------------------- -->
    <div id="dicu">
        <div class="row cells12">
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Quốc tịch: </div>
                <div class="input-control text">
                    <select name="id_quoctich_dc" id="id_quoctich_dc" class="diachi" data-allow-clear="true">
                        <option value="">Quốc tịch</option>
                        <?php
                        if($quocgia_list){
                            foreach ($quocgia_list as $qg) {
                                echo '<option value="'.$qg['_id'].'"'.($qg['_id'] == $id_quoctich_dc ? ' selected' : '').'>'.$qg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Tôn giáo: </div>
                <div class="input-control text">
                    <select name="id_tongiao_dc" id="id_tongiao_dc" class="diachi" data-allow-clear="true">
                        <option value="">Tôn giáo</option>
                        <?php
                        $tongiao = new TonGiao();
                        $tongiao_list = $tongiao->get_all_list();
                        if($tongiao_list){
                            foreach ($tongiao_list as $tg) {
                                echo '<option value="'.$tg['_id'].'"'.($tg['_id'] == $id_tongiao_dc ? ' selected' : '').'>'.$tg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Ngày di cư: </div>
                <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                    <input type="text" name="ngaydicu" id="ngaydicu" placeholder="Ngày di cư" value="<?php echo isset($ngaydicu) ? $ngaydicu : ''; ?>" data-inputmask="'alias': 'date'" />
                    <button class="button"><span class="mif-calendar"></span></button>
                </div>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Quốc gia di cư: </div>
                <div class="input-control text">
                    <select name="id_quocgia_dc" id="id_quocgia_dc" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia di cư</option>
                        <?php
                        if($quocgia_list){
                            foreach ($quocgia_list as $qg) {
                                echo '<option value="'.$qg['_id'].'"'.($qg['_id'] == $id_quocgia_dc ? ' selected' : '').'>'.$qg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Diện di cư: </div>
                <div class="input-control text">
                    <select name="id_diendicu" id="id_diendicu" class="diachi" data-allow-clear="true">
                        <option value="">Diện di cư</option>
                        <?php
                        $diendicu = new DienDiDinhCu();
                        $diendicu_list = $diendicu->get_all_list();
                        if($diendicu_list){
                            foreach ($diendicu_list as $ddc) {
                                echo '<option value="'.$ddc['_id'].'"'.($ddc['_id'] == $id_diendicu ? ' selected' : '').'>'.$ddc['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------ END DI CU ------------------- -->
    <!------------------------------ DINH CU ------------------- -->
    <div id="dinhcu">
        <div class="row cells12">
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Quốc Gia Định cư: </div>
                <div class="input-control text">
                    <select name="id_quocgia_dic" id="id_quocgia_dic" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($quocgia_list){
                            foreach ($quocgia_list as $qg) {
                                echo '<option value="'.$qg['_id'].'"'.($qg['_id'] == $id_quocgia_dic ? ' selected' : '').'>'.$qg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Ngày nhập tịch: </div>
                <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                    <input type="text" name="ngaynhaptich" id="ngaynhaptich" placeholder="Ngày nhập tịch" value="<?php echo isset($ngaynhaptich) ? $ngaynhaptich : ''; ?>" data-inputmask="'alias': 'date'" />
                    <button class="button"><span class="mif-calendar"></span></button>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------ END DINH CU ------------------- -->
</div>
<button class="button primary" name="submit" value="OK" id="submit"><span class="mif-checkmark"></span> Tìm kiếm</button>
</form>
<hr />
<?php if(isset($congdan_list) && $congdan_list): ?>
	<h2 class="align-center">Kết quả tìm kiếm có <b><?php echo $congdan_list->count(); ?></b> Công dân</h2>
<table class="table hovered striped">
<thead>
	<tr>
		<th>STT</th>
		<th>ID</th>
		<th>Họ tên</th>
		<th>Giới tính</th>
		<th>Ngày sinh</th>
	</tr>	
</thead>
<tbody>
<?php
	$i=1;
	foreach ($congdan_list as $cd) {
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$cd['code'].'</td>';
		echo '<td><a href="congdan.php?id='.$cd['_id'].'" target="_blank">'.$cd['hoten'].'</a></td>';
		echo '<td>'.$cd['gioitinh'].'</td>';
		echo '<td>'.($cd['ngaysinh'] ? date("d/m/Y", $cd['ngaysinh']->sec) : '').'</td>';
		echo '</tr>';$i++;
	}
?>
</tbody>
</table>
<?php endif; ?>
<?php require_once('footer.php'); ?>